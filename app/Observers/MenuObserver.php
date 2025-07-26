<?php

namespace App\Observers;

use App\Models\Menu;

class MenuObserver
{
    /**
     * Handle the Menu "created" event.
     */
    public function created(Menu $menu): void
    {
        cache()->forget('menu_'.$menu->location);
    }

    /**
     * Handle the Menu "updated" event.
     */
    public function updated(Menu $menu): void
    {
        cache()->forget('menu_'.$menu->location);
    }

    /**
     * Handle the Menu "deleted" event.
     */
    public function deleted(Menu $menu): void
    {
        cache()->forget('menu_'.$menu->location);
    }

    /**
     * Handle the Menu "restored" event.
     */
    public function restored(Menu $menu): void
    {
        cache()->forget('menu_'.$menu->location);
    }

    /**
     * Handle the Menu "force deleted" event.
     */
    public function forceDeleted(Menu $menu): void
    {
        cache()->forget('menu_'.$menu->location);
    }
}
