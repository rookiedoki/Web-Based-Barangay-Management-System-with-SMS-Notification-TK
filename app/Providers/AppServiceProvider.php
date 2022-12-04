<?php

namespace App\Providers;

use App\Models\FreqAsked;
use App\Models\FreqAskedTitle;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrapFive();
        View::share('setting',\App\Models\settings::all());
        View::share('official',\App\Models\barangayOfficial::all());
        View::share('ann',\App\Models\Announcements::all());
        View::share('freq_asked',FreqAsked::all());
        View::share('freq_asked_title',FreqAskedTitle::all());

    }
}
