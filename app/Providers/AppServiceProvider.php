<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;

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
            if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
        
        $this->app['router']->aliasMiddleware('admin', \App\Http\Middleware\AdminMiddleware::class);
        $this->app['router']->aliasMiddleware('user', \App\Http\Middleware\UserMiddleware::class);

    }
}
