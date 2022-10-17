<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HubFile extends Model
{
    use HasFactory;
    public $envBucket;
    protected $guarded = ['id','created_at','updated_at'];
    public function getRouteKeyName(){
        return 'name';
    }
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
    public function get_url(){
                if($this->visibility=="PRIVATE")return $this->get_temp_url();
        return \Storage::disk($this->bucket_name)->url(strtolower($this->visibility).$this->path.$this->name);
    }
    public function get_path(){
        return \Storage::disk($this->bucket_name)->path(strtolower($this->visibility).$this->path.$this->name);
    }
    public function get_source(){
        return \Storage::disk($this->bucket_name)->get(strtolower($this->visibility).$this->path.$this->name);
    }
    public function get_size(){
        return \Storage::disk($this->bucket_name)->size(strtolower($this->visibility).$this->path.$this->name);
    }
    public function download(){
        if($this->visibility=="PRIVATE")return $this->get_temp_url();
        return \Storage::disk($this->bucket_name)->download(strtolower($this->visibility).$this->path.$this->name);
    }
    public function get_temp_url(){
        if(!$this->has_access_to_get_private_file())abort(403);

        if(config("filesystems.disks.{$this->bucket_name}.driver")=="s3")
            return \Storage::disk($this->bucket_name)->temporaryUrl(strtolower($this->visibility).$this->path.$this->name,now()->addHour());

        return \Storage::disk($this->bucket_name)->url(strtolower($this->visibility).$this->path.$this->name);
    }
    public function has_access_to_get_private_file(){
        return 1;
    }
    
}
