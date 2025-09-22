<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // Share menu ke semua view
        View::composer('*', function ($view) {
            $menu = [
                ['name' => 'Home', 'url' => route('home')],
                ['name' => 'Learn', 'url' => route('learn.index')],
                ['name' => 'Practice', 'url' => route('practice')],
            ];
            $view->with('menu', $menu);
        });
    }
}
