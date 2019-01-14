<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.user.header',function($view){
            $product_type = Category:: where('parent_id', '=', 0)->get();
            $view -> with("product_type", $product_type);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
