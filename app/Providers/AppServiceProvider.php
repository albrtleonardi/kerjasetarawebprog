<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot()
    {
        // Share the authenticated user with all views that extend 'layouts.usernavbar'
        View::composer('layouts.usernavbar', function ($view) {
            $view->with('user', Auth::user());
        });
    }

}
