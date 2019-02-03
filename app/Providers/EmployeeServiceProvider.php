<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Employee;

class EmployeeServiceProvider extends ServiceProvider
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
        view()->composer('*', function($view) {
            $view->with('employees', Employee::all());
        });
    }
}
