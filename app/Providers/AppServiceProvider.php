<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\CommonAdmin;
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
        $CommonAdminmodel = new CommonAdmin();
        $website_settings = $CommonAdminmodel->getWebSetting('web_settings');

        $setting=\App\Models\Setting::first();
        Paginator::useBootstrap();
        View::share('recent_posts',\App\Models\Post::orderBy('id','desc')->limit($setting->recent_limit)->get());
        View::share('popular_posts',\App\Models\Post::orderBy('views','desc')->limit($setting->popular_limit)->get());

        View::share('website_settings',$website_settings);
    }
}
