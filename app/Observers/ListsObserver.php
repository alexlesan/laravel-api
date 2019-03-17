<?php

namespace App\Observers;


use App\Models\Lists;
use App\Models\ListsValidation;

class ListsObserver
{
    public function creating(Lists $lists)
    {
        ListsValidation::validateList();
    }
    /**
     * Handle the lists "created" event.
     *
     * @param  \App\Lists  $lists
     * @return void
     */
    public function created(Lists $lists)
    {
        //
    }

    /**
     * Handle the lists "updated" event.
     *
     * @param  \App\Lists  $lists
     * @return void
     */
    public function updated(Lists $lists)
    {
        //
    }

    /**
     * Handle the lists "deleted" event.
     *
     * @param  \App\Lists  $lists
     * @return void
     */
    public function deleted(Lists $lists)
    {
        //
    }

    /**
     * Handle the lists "restored" event.
     *
     * @param  \App\Lists  $lists
     * @return void
     */
    public function restored(Lists $lists)
    {
        //
    }

    /**
     * Handle the lists "force deleted" event.
     *
     * @param  \App\Lists  $lists
     * @return void
     */
    public function forceDeleted(Lists $lists)
    {
        //
    }
}
