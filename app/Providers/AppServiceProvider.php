<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\RosterStore;
use App\Services\SessionRosterStore;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RosterStore::class, SessionRosterStore::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
 }