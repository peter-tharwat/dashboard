<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [ 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    /*protected $appends = [
        'profile_photo_url',
    ];*/


    public function getUserAvatar(){
        if($this->avatar==null)
            return env('DEFAULT_IMAGE_AVATAR');
        else
            return env('STORAGE_URL').'/uploads/users/'.$this->avatar;
    }
    
    public function scopeWithoutTimestamps()
    {
        $this->timestamps = false;
        return $this;
    }

    public function has_access_to($action , $item){
        /*
        create
        read
        update
        delete
        */

        if(!($item   instanceof \Illuminate\Database\Eloquent\Model )) return 0;

        if(auth()->user()->power == "ADMIN"){
            return 1 ;
        }elseif(auth()->user()->power == "EDITOR"){

            if($item->getTable()=="users") 
                return 0;
            if($item->getTable()=="contacts") 
                return 0;
            return 1;

        }elseif(auth()->user()->power == "CONTRIBUTOR"){
           
           if($item->getTable()=="users") 
                return 0;
           if($item->user_id == auth()->user()->id)
                return 1;
           else
                return 0;
        }

    }
    

}
