<?php

namespace App\Providers;

use App\Contracts\AccountInterface;
use App\Contracts\ToolInterface;
use App\Services\AccountService;
use App\Services\ToolService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        ToolInterface::class=>ToolService::class,
        AccountInterface::class=>AccountService::class
    ];
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
    }
}
