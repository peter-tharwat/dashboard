<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Notifications extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $notifications;
    public function __construct($notifications)
    {
        $this->notifications=$notifications;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render($render=null)
    {
        $notifications=$this->notifications; 
            return (null!==$render)?view('components.notifications',compact('notifications'))->render():view('components.notifications'); 
    }
}


  