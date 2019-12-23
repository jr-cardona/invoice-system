<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        // Compose a list of Types document
        View::composer(
            ['clients._form', 'clients.index', 'sellers._form', 'sellers.index'],
            'App\Http\View\Composers\TypeDocumentComposer'
        );
    }
}
