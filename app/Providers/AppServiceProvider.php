<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Department;
use App\Models\Direction;
use App\Models\Management;
use App\Observers\CompanyObserver;
use App\Observers\DepartmentObserver;
use App\Observers\DirectionObserver;
use App\Observers\ManagementObserver;
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
        Management::observe(ManagementObserver::class);
        Department::observe(DepartmentObserver::class);
    }

}
