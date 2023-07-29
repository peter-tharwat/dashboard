<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
class DashboardStatistics extends Component
{
    public $date_from;
    public $date_to;
    public $url;
    public $prev_url;
    public $user_id;
    public $country_code;
    public $days_between=0;




    public function __construct()
    {
        if(request()->get('date_from')!=null && request()->get('date_to')!=null){
            $this->date_from = \Carbon::parse(request()->get('date_from'))->format('Y-m-d');
            $this->date_to = \Carbon::parse(request()->get('date_to'))->format('Y-m-d');
            $this->days_between= abs(\Carbon::parse($this->date_from)->diffInDays($this->date_to))>31?31:abs(\Carbon::parse($this->date_from)->diffInDays($this->date_to));
        }else{
            $this->date_from = \Carbon::parse(now())->subDays(7)->format('Y-m-d');
            $this->date_to = \Carbon::parse(now())->format('Y-m-d'); 
            $this->days_between=7;
        }

        $this->url=request()->get('url');
        $this->prev_url=request()->get('prev_url');
        $this->country_code=request()->get('country_code');
        $this->user_id=request()->get('user_id');

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
            'traffics'=>$this->traffics(),
            'top_domains'=>$this->top_domains(),
            'top_countries'=>$this->top_countries(),
            'current_visitors'=>$this->current_visitors(),
        ];
        return view('livewire.dashboard-statistics',compact('data'));
    }  
    public function top_pages(){
    
        return \App\Models\RateLimitDetail::where(function($q){
            $q->whereDate('created_at','>=',$this->date_from)->whereDate('created_at','<=',$this->date_to);
        })->where(function($q){

            if($this->url!=null)
                $q->whereHas('rate_limit',function($q){$q->where('traffic_landing',$this->url);});
            if($this->prev_url!=null)
                $q->whereHas('rate_limit',function($q){$q->where('prev_url',$this->prev_url);});
            if($this->country_code!=null)
                $q->whereHas('rate_limit',function($q){$q->where('country_code',$this->country_code);});
            if($this->user_id!=null)
                $q->whereHas('rate_limit',function($q){$q->where('user_id',$this->user_id);});

        })->whereNotIn('url',[route('admin.notifications.ajax'),route('manifest')])->groupBy('url')->orderBy(\DB::raw("count('url')"),'DESC')->select()->addSelect(\DB::raw("count('url') as count"))->limit(10)->get();
    }
    public function top_browsers(){
        return \App\Models\RateLimit::where(function($q){
            if($this->url!=null)
                $q->where('traffic_landing',$this->url);
            if($this->prev_url!=null)
                $q->where('prev_url',$this->prev_url);
            if($this->country_code!=null)
                $q->where('country_code',$this->country_code);
            if($this->user_id!=null)
                $q->where('user_id',$this->user_id);
            $q->whereDate('created_at','>=',$this->date_from)->whereDate('created_at','<=',$this->date_to);
        })->groupBy('browser')->orderBy(\DB::raw("count('browser')"),'DESC')->select()->addSelect(\DB::raw("count('browser') as count"))->limit(10)->get();
    }
    public function top_devices(){
        return \App\Models\RateLimit::where(function($q){
            if($this->url!=null)
                $q->where('traffic_landing',$this->url);
            if($this->prev_url!=null)
                $q->where('prev_url',$this->prev_url);
            if($this->country_code!=null)
                $q->where('country_code',$this->country_code);
            if($this->user_id!=null)
                $q->where('user_id',$this->user_id);
            $q->whereDate('created_at','>=',$this->date_from)->whereDate('created_at','<=',$this->date_to);
        })->groupBy('device')->orderBy(\DB::raw("count('device')"),'DESC')->select()->addSelect(\DB::raw("count('device') as count"))->limit(10)->get();
    }
    public function top_operating_systems(){
        return \App\Models\RateLimit::where(function($q){
            if($this->url!=null)
                $q->where('traffic_landing',$this->url);
            if($this->prev_url!=null)
                $q->where('prev_url',$this->prev_url);
            if($this->country_code!=null)
                $q->where('country_code',$this->country_code);
            if($this->user_id!=null)
                $q->where('user_id',$this->user_id);
            $q->whereDate('created_at','>=',$this->date_from)->whereDate('created_at','<=',$this->date_to);
        })->groupBy('operating_system')->orderBy(\DB::raw("count('operating_system')"),'DESC')->select()->addSelect(\DB::raw("count('operating_system') as count"))->limit(10)->get();
    }
    public function top_users(){
        return \App\Models\RateLimitDetail::where(function($q){
            if($this->user_id!=null)
                $q->where('id',$this->user_id);
            $q->whereDate('created_at','>=',$this->date_from)->whereDate('created_at','<=',$this->date_to);
        })->groupBy('user_id')->orderBy(\DB::raw("count('user_id')"),'DESC')->select()->addSelect(\DB::raw("count('user_id') as count"))->with(['user'])->limit(10)->get();
    }
    public function top_ips(){
        return \App\Models\RateLimit::where(function($q){
            if($this->url!=null)
                $q->where('traffic_landing',$this->url);
            if($this->prev_url!=null)
                $q->where('prev_url',$this->prev_url);
            if($this->country_code!=null)
                $q->where('country_code',$this->country_code);
            if($this->user_id!=null)
                $q->where('user_id',$this->user_id);
            $q->whereDate('created_at','>=',$this->date_from)->whereDate('created_at','<=',$this->date_to);
        })->groupBy('ip')->orderBy(\DB::raw("count('ip')"),'DESC')->select()->addSelect(\DB::raw("count('ip') as count"))->limit(7)->get();
    }
    public function traffics(){
        $traffics=[];
        $week_traffics_queries=[];
        $date = new \DateTime($this->date_to);
        $date->modify("+$this->days_between day");
        $days=[];
        for($i=1;$i<=$this->days_between;$i++){
            $sub= $this->days_between-$i;
            array_push($days,\Carbon::parse(date('d.m.Y',strtotime("-$sub  days")))->format('Y-m-d'));
        }
        for($i=0;$i<count($days);$i++){
            array_push($week_traffics_queries, 
                \DB::raw('(SELECT count(id) from rate_limits WHERE DATE(created_at) = "'.$days[$i].'") as total_traffics_'.str_replace('-', '_', $days[$i]))

             );
        }
        $total = collect(\DB::table('rate_limits')->where(function($q){

            if($this->url!=null)
                $q->where('traffic_landing',$this->url);
            if($this->prev_url!=null)
                $q->where('prev_url',$this->prev_url);
            if($this->country_code!=null)
                $q->where('country_code',$this->country_code);
            if($this->user_id!=null)
                $q->where('user_id',$this->user_id);

        })->select($week_traffics_queries)->first());
        for($i=0;$i<count($days);$i++){
            try{
                $traffics[\Carbon::parse($days[$i])->format('m-d')]=
                $total['total_traffics_'.str_replace('-', '_', $days[$i]) ] ;
            }catch(\Exception $e){}
        }
        return array_reverse($traffics);
    }
    public function new_users(){
        $new_users_count= [];
        $days_list = [];
        $counts_list = [];
        $date_from = \Carbon::parse($this->date_from);
        $to = \Carbon::parse($this->date_to);
        $days = $date_from->diffInDays($to);
        for($i = 0 ; $i < $days && $i < $this->days_between  ; $i++){
            array_push($days_list,$to->format('m-d'));
            array_push($counts_list,\App\Models\User::whereDate('created_at',$to->format('Y-m-d'))->count());
            $to = $to->subDays(1);
        }
        return $new_users_count=['days_list'=>$days_list,'counts_list'=>$counts_list];
    }
    public function top_domains(){

        return \App\Models\RateLimit::where(function($q){
            if($this->url!=null)
                $q->where('traffic_landing',$this->url);
            if($this->prev_url!=null)
                $q->where('prev_url',$this->prev_url);
            if($this->country_code!=null)
                $q->where('country_code',$this->country_code);
            if($this->user_id!=null)
                $q->where('user_id',$this->user_id);
            $q->whereDate('created_at','>=',$this->date_from)->whereDate('created_at','<=',$this->date_to);
        })->whereNotNull('prev_link')->select(['rate_limits.*',\DB::raw("COUNT(*) AS domain_count,SUBSTRING_INDEX(REPLACE(REPLACE(REPLACE(prev_link,'http://',''),'https://',''),'www.',''),'/',1) AS main_domain")])->orderBy('domain_count','DESC')->groupBy('main_domain')->orderBy('domain_count','DESC')->limit(7)->get();

    }
    public function top_countries(){

        return \App\Models\RateLimit::where(function($q){
            if($this->url!=null)
                $q->where('traffic_landing',$this->url);
            if($this->prev_url!=null)
                $q->where('prev_url',$this->prev_url);
            if($this->country_code!=null)
                $q->where('country_code',$this->country_code);
            if($this->user_id!=null)
                $q->where('user_id',$this->user_id);

            $q->whereDate('created_at','>=',$this->date_from)->whereDate('created_at','<=',$this->date_to);
        })->groupBy('country_code')->orderBy(\DB::raw("count('country_code')"),'DESC')->select()->addSelect(\DB::raw("count('country_code') as count"))->limit(10)->get();

    }
    public function current_visitors(){
        return \App\Models\RateLimitDetail::whereHas('rate_limit',function($q){

            if($this->url!=null)
                $q->where('traffic_landing',$this->url);
            if($this->prev_url!=null)
                $q->where('prev_url',$this->prev_url);
            if($this->country_code!=null)
                $q->where('country_code',$this->country_code);
            if($this->user_id!=null)
                $q->where('user_id',$this->user_id);
            
        })->where('created_at','>',\Carbon::parse(now())->subMinutes(5)->format('Y-m-d H:i:s'))->groupBy('rate_limit_id')->distinct('rate_limit_id')->get();
    }

}
