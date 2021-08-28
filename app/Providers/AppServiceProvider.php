<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Direction;
use App\Observers\CompanyObserver;
use App\Observers\DirectionObserver;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        Company::observe(CompanyObserver::class);
        Direction::observe(DirectionObserver::class);
    }

}
