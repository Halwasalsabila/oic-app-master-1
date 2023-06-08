<?php

namespace App\Providers;

use App\Models\Project;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
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
        //
        View::composer('component.sidebar', function ($view) {
            $project = Project::get(['id', 'name', 'slug']);
            return $view->with('project', $project);
        });
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
    }
}
