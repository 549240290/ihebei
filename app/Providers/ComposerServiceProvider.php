<?php
namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::share('site_name',ENV('SITE_NAME','游戏中国'));
        View::composer('home.menus', 'App\Http\ViewComposers\MenusComposer');
        View::composer('home.*','App\Http\ViewComposers\TopComposer');
        View::composer('home.*','App\Http\ViewComposers\HotsComposer');
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