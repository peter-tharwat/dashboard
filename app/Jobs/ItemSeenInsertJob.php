<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ItemSeenInsertJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $model_name;
    public $model_id;
    public $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($model_name,$model_id,$data)
    {
        $this->model_name = $model_name;
        $this->model_id = $model_id;
        $this->data = $data;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $classNameString = strtoupper((new \ReflectionClass($this->model_name))->getShortName());
        $data = $this->data;
        $model_id = $this->model_id;
        $item_seens = cache()->get('item_seens')??[];


        $item_seen = cache()->remember('item_seen_'.\MainHelper::slug($this->model_id).\MainHelper::slug($classNameString).$this->data['ip'],60*60*24,function()use($data,$model_id,$classNameString,$item_seens){
            array_push($item_seens,[
                'type_id'=>$this->model_id,
                'type'=>$classNameString,
                'ip'=>$this->data['ip'],
                'prev_link'=>$this->data['prev_link'],
                'agent_name'=>$this->data['agent_name'],
                'browser'=>$this->data['browser'],
                'device'=>$this->data['device'],
                'operating_system'=>$this->data['operating_system']
            ]);
            cache()->put('item_seens',$item_seens);
            $className = $this->model_name;
            $className::where('id',$this->model_id)->increment('views');
            return 1;
        });


    }
}
