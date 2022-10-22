<?php

namespace Modules\Team\Http\Controllers;

class DataShareController
{
    public function Test() {
        return [1,2,3,4];
    }

    public function Test2($name) {
        return [...$this->Test(),$name];
    }
}
