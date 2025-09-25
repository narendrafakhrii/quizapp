<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
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
        View::composer('*', function ($view) {
    $currentRoute = Route::currentRouteName();

    
    $noMenuRoutes = ['start'];

    if (in_array($currentRoute, $noMenuRoutes)) {
        $menu = []; 
    } else {
        $menu = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Learn', 'url' => route('learn.index')],
            ['name' => 'Practice', 'url' => route('practice')],
        ];
    }

    $view->with('menu', $menu);
});
    }
}
