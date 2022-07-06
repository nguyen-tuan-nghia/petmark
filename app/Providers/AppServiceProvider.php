<?php

namespace App\Providers;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use App\Models\category;
use App\Models\category_post;
use App\Models\web_detail;

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
        if(env('APP_ENV')!='local'){
            URL::ForceScheme('https');
        }
        view()->composer('*',function($view) {
            $danh_muc=category::get();
            $web_detail=web_detail::first();
            $danh_muc_tin_tuc=category_post::get();
            $view->with(compact('danh_muc','web_detail','danh_muc_tin_tuc'));
    });
}
}
