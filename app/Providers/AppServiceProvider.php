<?php

namespace App\Providers;


use Cookie;
use App\Models\Category;
use App\Models\Provincia;
use Laravel\Fortify\Fortify;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        if (Schema::hasTable('categories')) {
            View::share('categories', Category::all());
        }

        if (Schema::hasTable('provincias')) {
            View::share('provincias', Provincia::all());
        }


        Paginator::useBootstrapFive();

        $theme = Cookie::get('theme');
        if ($theme != 'dark' && $theme != 'light') {
            $theme = 'light';
        }
        View::share('theme', $theme);


    }
}
