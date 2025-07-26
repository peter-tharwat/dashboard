<?php

namespace App\Observers;

use App\Models\MenuLink;

class MenuLinkObserver
{
    /**
     * Handle the MenuLink "created" event.
     */
    public function created(MenuLink $menuLink): void
    {
        cache()->forget('menu_'.$menuLink->menu->location);
    }

    /**
     * Handle the MenuLink "updated" event.
     */
    public function updated(MenuLink $menuLink): void
    {
        cache()->forget('menu_'.$menuLink->menu->location);
    }

    /**
     * Handle the MenuLink "deleted" event.
     */
    public function deleted(MenuLink $menuLink): void
    {
        cache()->forget('menu_'.$menuLink->menu->location);
    }

    /**
     * Handle the MenuLink "restored" event.
     */
    public function restored(MenuLink $menuLink): void
    {
        cache()->forget('menu_'.$menuLink->menu->location);
    }

    /**
     * Handle the MenuLink "force deleted" event.
     */
    public function forceDeleted(MenuLink $menuLink): void
    {
        cache()->forget('menu_'.$menuLink->menu->location);
    }
}
