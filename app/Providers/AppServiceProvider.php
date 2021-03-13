<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer(['admin.master.sidebar'],'App\Http\ViewComposer\PublicComposer@getMenu');
        View::composer(['admin.dashboard'],'App\Http\ViewComposer\PublicComposer@getSlider');
        
    }
}
