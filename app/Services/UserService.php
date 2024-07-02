<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService extends BaseService
{
    public function __construct(UserRepository $model)
    {
        parent::__construct($model);
    }

}
