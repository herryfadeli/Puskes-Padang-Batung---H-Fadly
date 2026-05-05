<?php

namespace App\Providers;

use App\Models\Obat;
use App\Observers\ObatObserver;
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
        Obat::observe(ObatObserver::class);
        
        // Fix for php artisan serve on Windows with PHP 8.4
        if (class_exists(\Illuminate\Foundation\Console\ServeCommand::class)) {
            \Illuminate\Foundation\Console\ServeCommand::$passthroughVariables[] = 'SystemRoot';
            \Illuminate\Foundation\Console\ServeCommand::$passthroughVariables[] = 'SystemDrive';
        }
    }
}
