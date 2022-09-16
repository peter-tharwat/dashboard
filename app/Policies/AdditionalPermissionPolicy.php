<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdditionalPermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function show_statistics(User $user){
        if(in_array($user->power,["ADMIN"]))
            return 1;
        return 0;
    }
    public function create_notifications(User $user){
        if(in_array($user->power,["ADMIN"]))
            return 1;
        return 0;
    }
    
}
