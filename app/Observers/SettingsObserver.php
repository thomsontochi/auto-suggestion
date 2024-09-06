<?php

namespace App\Observers;

use App\Models\User;

class SettingsObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user)
    {
        // Assign default settings when a new user is created
        $user->settings()->create([
            'max_results' => 10,
            'display_suggestion_term' => true,
            'display_collection' => true,
            'display_product' => true,
            'search_delay' => 300,
            'min_characters' => 2,
        ]);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
