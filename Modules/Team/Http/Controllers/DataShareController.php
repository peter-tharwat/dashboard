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


    public function menu() {
        return [
            'name' => 'تجريب 1',
            'action' => '#',
            'icon' => 'fa fa-users',
            'child' => [
                [
                    'name' => 'تجريب 2',
                    'action' => '#',
                    'icon' => 'fa fa-users',
                ],
                [
                    'name' => 'تجريب 3',
                    'action' => '#',
                    'icon' => 'fa fa-users',
                ]
            ]
        ];
    }
    public function permissions() {
        return [
            'table' => 'users',
        ];
    }

}
