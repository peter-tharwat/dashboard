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

        $rate_limits= cache()->get('rate_limits')??[];
        $rate_limit_details = cache()->get('rate_limit_details')??[];


        cache()->remember('rate_limit_'.\MainHelper::slug($data['ip']),60*60,function()use($data,$rate_limits){
            $country=(new \UserSystemInfoHelper)->get_country_from_ip($data['ip']);
            array_push($rate_limits, [
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
            cache()->put('rate_limits',$rate_limits);
            return 1;
        });
        array_push($rate_limit_details,[
            'url'=>$data['traffic_landing'],
            'user_id'=> $data['user_id'],
            //'rate_limit_id'=>$last_insert->id,
            'ip'=>$data['ip'],
            'created_at'=>\Carbon::parse(now())->format('Y-m-d H:i:s'),
            'updated_at'=>\Carbon::parse(now())->format('Y-m-d H:i:s'),   
        ]);
        cache()->put('rate_limit_details',$rate_limit_details);


    }
}
