<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if(auth()->check()) {
            if(session('seen_notifications')==null)
            {
                session(['seen_notifications'=>0]);
            }
            $notifications=auth()->user()->notifications()->orderBy('created_at','DESC')->limit(50)->get();
            $unreadNotifications=auth()->user()->unreadNotifications()->count();
            
        }
   
        return view('components.admin.navbar', compact('notifications', 'unreadNotifications'));
    }
}
