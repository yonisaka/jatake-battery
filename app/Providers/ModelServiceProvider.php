<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Products;
use Illuminate\Support\Facades\Schema;

class ModelServiceProvider extends ServiceProvider
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
        //
        Schema::defaultStringLength(191); //NEW: Increase StringLength
        Products::observe(\App\Observers\ProductsOberver::class);
    }
}
