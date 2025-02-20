<?php

namespace App\Providers;

use App\Repositories\DepartmentRepository;
use App\Services\DepartmentService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            DepartmentRepository::class, function ($app) {
            return new DepartmentRepository();
        });

        $this->app->bind(
            DepartmentService::class, function ($app) {
            return new DepartmentService($app->make(DepartmentRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public
    function boot(): void
    {
        //
    }
}
