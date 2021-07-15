<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  App\Models\Category;
use View;
class layoutprovider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
    }
}
