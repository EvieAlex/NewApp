<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia ;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Inertia::share('errors' , function() {
            return session()->get('errors') ? session()->get('errors')->getBag('default')->getMessages() : (object) [] ;
        });

        Inertia::share('success', function() {
            return session()->get('success') ;
        }) ;
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

