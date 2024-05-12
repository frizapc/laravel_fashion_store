<?php

namespace App\Observers;

use App\Models\Fashion;

class FashionObserver
{
    /**
     * Handle the Fashion "created" event.
     */
    public function created(Fashion $fashion): void
    {
        //
    }

    /**
     * Handle the Fashion "updated" event.
     */
    public function updated(Fashion $fashion): void
    {
        //
    }

    /**
     * Handle the Fashion "deleted" event.
     */
    public function deleted(Fashion $fashion): void
    {
        //
    }

    /**
     * Handle the Fashion "restored" event.
     */
    public function restored(Fashion $fashion): void
    {
        //
    }

    /**
     * Handle the Fashion "force deleted" event.
     */
    public function forceDeleted(Fashion $fashion): void
    {
       $fashion->comments()->delete();
    }
}
