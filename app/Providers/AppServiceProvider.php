<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('shared._card', 'card');
        Paginator::useBootstrapFive();
        Builder::macro('whereQuery', function ($subquery, $value) {
            $this->addBinding($subquery->getBindings());
            $this->where(DB::raw("({$subquery->toSql()}"), $value);
        });
    }
}
