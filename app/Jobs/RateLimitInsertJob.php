<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RateLimitInsertJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $tries = 2;
    public $timeout = 0.1;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data= $data;
    }

    public function handle()
    {
        $data=$this->data;
        $last_insert = cache()->remember('rate_limit_'.\MainHelper::slug($data['ip']),60*20,function()use($data){
            $last_insert = \App\Models\RateLimit::where('ip',$data['ip'])->where('created_at','>=',\Carbon::parse(now())->subMinutes(19))->orderBy('id','DESC')->first();

            if($last_insert!=null){
                return $last_insert;
            }if($last_insert==null){
                $country=(new \UserSystemInfoHelper)->get_country_from_ip($data['ip']);
                $last_insert= \App\Models\RateLimit::create([
                    'traffic_landing'=>$data['traffic_landing'],
                    'domain'=>$data['prev_domain'],
                    'prev_link'=>$data['prev_url'],
                    'ip'=>$data['ip'],
                    'country_code'=>$country['country_code'],
                    'country_name'=>$country['country'],
                    'agent_name'=>$data['agent_name'],
                    'user_id'=>$data['user_id'],
                    'browser'=>$data['browser'],
                    'device'=>$data['device'],
                    'operating_system'=>$data['operating_system'],
                    'created_at'=>\Carbon::parse(now())->format('Y-m-d H:i:s'),
                    'updated_at'=>\Carbon::parse(now())->format('Y-m-d H:i:s'),
                ]); 
                return $last_insert;
            }

        });
        $rate_limit_detail = \App\Models\RateLimitDetail::insert([[
            'url'=>$data['traffic_landing'],
            'user_id'=> $data['user_id'],
            'rate_limit_id'=>$last_insert->id,
            'ip'=>$data['ip'],
            'created_at'=>\Carbon::parse(now())->format('Y-m-d H:i:s'),
            'updated_at'=>\Carbon::parse(now())->format('Y-m-d H:i:s'),
        ]]);

    }
}
