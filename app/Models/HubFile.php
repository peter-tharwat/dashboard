<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HubFile extends Model
{
    use HasFactory;
    public $envBucket;
    public function __construct()
    {
        $this->envBucket = env('AWS_BUCKET').'/';
        if(env('AWS_BUCKET')==null)
            $this->envBucket = env('AWS_BUCKET');

    }
    protected $guarded = ['id','created_at','updated_at'];
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
    public function get_real_url(){
        return \Storage::disk($this->bucket_name)->url($this->envBucket.strtolower($this->visibility).$this->path.$this->name);
    }
    public function get_url(){
        return \Storage::disk($this->bucket_name)->url($this->envBucket.strtolower($this->visibility).$this->path.$this->name);
    }
    public function get_path(){
        return \Storage::disk($this->bucket_name)->path($this->envBucket.strtolower($this->visibility).$this->path.$this->name);
    }
    public function get_source(){
        return \Storage::disk($this->bucket_name)->get($this->envBucket.strtolower($this->visibility).$this->path.$this->name);
    }
    public function get_size(){
        return \Storage::disk($this->bucket_name)->size($this->envBucket.strtolower($this->visibility).$this->path.$this->name);
    }
    public function download(){
        return \Storage::disk($this->bucket_name)->download($this->envBucket.strtolower($this->visibility).$this->path.$this->name);
    }
}
