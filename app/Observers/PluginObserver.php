<?php

namespace App\Observers;

use App\Models\Plugin;

class PluginObserver
{
    /**
     * Handle the Plugin "created" event.
     */
    public function created(Plugin $plugin): void
    {
        cache()->forget('plugins');
    }

    /**
     * Handle the Plugin "updated" event.
     */
    public function updated(Plugin $plugin): void
    {
        cache()->forget('plugins');
    }

    /**
     * Handle the Plugin "deleted" event.
     */
    public function deleted(Plugin $plugin): void
    {
        cache()->forget('plugins');
    }

    /**
     * Handle the Plugin "restored" event.
     */
    public function restored(Plugin $plugin): void
    {
        cache()->forget('plugins');
    }

    /**
     * Handle the Plugin "force deleted" event.
     */
    public function forceDeleted(Plugin $plugin): void
    {
        cache()->forget('plugins');
    }
}
