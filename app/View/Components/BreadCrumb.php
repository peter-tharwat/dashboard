<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BreadCrumb extends Component
{

    public $breads;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($breads)
    {
        $this->breads = $breads;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bread-crumb');
    }
}
