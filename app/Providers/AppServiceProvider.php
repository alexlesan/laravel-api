<?php

namespace App\Providers;

use App\Models\Lists;
use App\Observers\ListsObserver;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Lists::observe(ListsObserver::class);

    }
}
