<?php

namespace App\Observers;

use App\Models\Application;
use App\Models\internships;

class AppliesObserver
{
    /**
     * Handle the Application "created" event.
     */
    public function created(Application $application): void
    {
        internships::where('id', $application->offer_id)->increment('applies');
    }

    /**
     * Handle the Application "updated" event.
     */
    public function updated(Application $application): void
    {
        //
    }

    /**
     * Handle the Application "deleted" event.
     */
    public function deleted(Application $application): void
    {
        //
    }

    /**
     * Handle the Application "restored" event.
     */
    public function restored(Application $application): void
    {
        //
    }

    /**
     * Handle the Application "force deleted" event.
     */
    public function forceDeleted(Application $application): void
    {
        //
    }
}
