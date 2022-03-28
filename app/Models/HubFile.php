<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HubFile extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    public function get_real_url(){
        return \Storage::disk($this->bucket_name)->url(env('AWS_BUCKET').'/'.strtolower($this->visibility).$this->path.$this->name);
    }
    public function get_url(){
        return \Storage::disk($this->bucket_name)->url(env('AWS_BUCKET').'/'.strtolower($this->visibility).$this->path.$this->name);
    }
    public function get_path(){
        return \Storage::disk($this->bucket_name)->path(env('AWS_BUCKET').'/'.strtolower($this->visibility).$this->path.$this->name);
    }
    public function get_source(){
        return \Storage::disk($this->bucket_name)->get(env('AWS_BUCKET').'/'.strtolower($this->visibility).$this->path.$this->name);
    }
    public function get_size(){
        return \Storage::disk($this->bucket_name)->size(env('AWS_BUCKET').'/'.strtolower($this->visibility).$this->path.$this->name);
    }
    public function download(){
        return \Storage::disk($this->bucket_name)->download(env('AWS_BUCKET').'/'.strtolower($this->visibility).$this->path.$this->name);
    }
}
