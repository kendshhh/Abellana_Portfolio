<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Home;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.footer', function ($view) {
            $view->with('contact', Contact::first())
                ->with('profile', Home::first());
        });
    }
}
