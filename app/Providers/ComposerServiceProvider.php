<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer(['index', 'auth.login', 'auth.register', 'products.details', 'orders.summary', 'faq', 'products.productBySubcategory', 'products.search', 'orders.show'], 'App\Http\ViewComposers\PageAllComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
