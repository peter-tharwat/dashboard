<?php

namespace App\Models;

use Laratrust\Models\LaratrustPermission;
use App\Models\Permission;

class Permission extends LaratrustPermission
{
    public $guarded = [];
}
