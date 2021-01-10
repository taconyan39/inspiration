<?php

namespace App\Providers;

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
        // mysqlがindexのデータ長を超えてしまうので(191)文字に調整
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
    }
}
