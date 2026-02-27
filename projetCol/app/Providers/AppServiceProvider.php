<?php

namespace App\Providers;

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

    // Hadi kat-forcer SMTP wakha l-cache ikoun m-bloqui
    config(['mail.default' => 'smtp']);
}
    
}
