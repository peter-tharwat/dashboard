<?php

namespace App\Services;

class BaseService
{
    /**
     * Create a new class instance.
     */
    public $repo;
    public function __construct($repo)
    {
        $this->repo = $repo;
    }
    public function all()
    {
        return $this->repo->all();
    }

    public function create($data)
    {
        
        return $this->repo->create($data);
    }

    public function update($data, $id)
    {
        return $this->repo->update($data, $id);
    }

    public function delete($id)
    {
        return $this->repo->delete($id);
    }
    public function get_paginated($request) 
    {
        return $this->repo->get_paginated($request);
    }
    public function translate_fields()
    {
        return $this->repo->translate_fields();
    }
    public function columns_fields()
    {
        return $this->repo->columns_fields();
    }
    
}
