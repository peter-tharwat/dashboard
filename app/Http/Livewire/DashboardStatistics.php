<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
class DashboardStatistics extends Component
{
    public $from;
    public $to;

    public function __construct()
    {
        if($this->from==null)
            $this->from = \Carbon::parse(now())->subDays(7)->format('Y-m-d');
        if($this->to==null)
            $this->to = \Carbon::parse(now())->format('Y-m-d'); 
    }
    public function render()
    {
        $data=[
            'top_pages'=>$this->top_pages(),
            'top_browsers'=>$this->top_browsers(),
            'top_operating_systems'=>$this->top_operating_systems(),
            'top_users'=>$this->top_users(),
            'top_devices'=>$this->top_devices(),
            'top_ips'=>$this->top_ips(),
            'new_users'=>$this->new_users(),
            'traffics'=>$this->traffics()
        ];
        return view('livewire.dashboard-statistics',compact('data'));
    }  
    public function top_pages(){
        return  \App\Models\RateLimitDetail::whereDate('created_at','>=',$this->from)->whereDate('created_at','<=',$this->to)->groupBy('url')->orderBy(\DB::raw("count('url')"),'DESC')->select()->addSelect(\DB::raw("count('url') as count"))->limit(10)->get();
    }
    public function top_browsers(){
        return \App\Models\RateLimit::whereDate('created_at','>=',$this->from)->whereDate('created_at','<=',$this->to)->groupBy('browser')->orderBy(\DB::raw("count('browser')"),'DESC')->select()->addSelect(\DB::raw("count('browser') as count"))->limit(10)->get();
    }
    public function top_devices(){
        return \App\Models\RateLimit::whereDate('created_at','>=',$this->from)->whereDate('created_at','<=',$this->to)->groupBy('device')->orderBy(\DB::raw("count('device')"),'DESC')->select()->addSelect(\DB::raw("count('device') as count"))->limit(10)->get();
    }
    public function top_operating_systems(){
        return \App\Models\RateLimit::whereDate('created_at','>=',$this->from)->whereDate('created_at','<=',$this->to)->groupBy('operating_system')->orderBy(\DB::raw("count('operating_system')"),'DESC')->select()->addSelect(\DB::raw("count('operating_system') as count"))->limit(10)->get();
    }
    public function top_users(){
        return \App\Models\RateLimitDetail::whereDate('created_at','>=',$this->from)->whereDate('created_at','<=',$this->to)->groupBy('user_id')->orderBy(\DB::raw("count('user_id')"),'DESC')->select()->addSelect(\DB::raw("count('user_id') as count"))->with(['user'])->limit(10)->get();
    }
    public function top_ips(){
        return \App\Models\RateLimit::whereDate('created_at','>=',$this->from)->whereDate('created_at','<=',$this->to)->groupBy('ip')->orderBy(\DB::raw("count('ip')"),'DESC')->select()->addSelect(\DB::raw("count('ip') as count"))->limit(10)->get();
    }
    public function traffics(){
        $traffics=[];
        $week_traffics_queries=[];
        $date = new \DateTime(date("Y-m-d"));
        $date->modify('+7 day');
        $days=[
            \Carbon::parse(date('d.m.Y',strtotime("-7 days")))->format('Y-m-d'),
            \Carbon::parse(date('d.m.Y',strtotime("-6 days")))->format('Y-m-d'),
            \Carbon::parse(date('d.m.Y',strtotime("-5 days")))->format('Y-m-d'),
            \Carbon::parse(date('d.m.Y',strtotime("-4 days")))->format('Y-m-d'),
            \Carbon::parse(date('d.m.Y',strtotime("-3 days")))->format('Y-m-d'),
            \Carbon::parse(date('d.m.Y',strtotime("-2 days")))->format('Y-m-d'),
            \Carbon::parse(date('d.m.Y',strtotime("-1 days")) )->format('Y-m-d'),
            \Carbon::parse(date('d.m.Y'))->format('Y-m-d')
        ];
        for($i=0;$i<count($days);$i++){
            array_push($week_traffics_queries, 
                \DB::raw('(SELECT count(id) FROM rate_limits WHERE DATE(created_at) = "'.$days[$i].'") as total_traffics_'.str_replace('-', '_', $days[$i]))

             );
        }

        $total = collect(\DB::table('rate_limits')->where('id',1)->select($week_traffics_queries)->first());
        for($i=0;$i<count($days);$i++){
            $traffics[\Carbon::parse($days[$i])->format('m-d')]=$total['total_traffics_'.str_replace('-', '_', $days[$i]) ] ;
        }
        return array_reverse($traffics);
    }
    public function new_users(){
        $new_users_count= [];
        $days_list = [];
        $counts_list = [];
        $from = \Carbon::parse($this->from);
        $to = \Carbon::parse($this->to);
        $days = $from->diffInDays($to);
        for($i = 0 ; $i < $days && $i < 30  ; $i++){
            array_push($days_list,$to->format('m-d'));
            array_push($counts_list,\App\Models\User::whereDate('created_at',$to->format('Y-m-d'))->count());
            $to = $to->subDays(1);
        }
        return $new_users_count=['days_list'=>$days_list,'counts_list'=>$counts_list];
    }

}
