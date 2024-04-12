<?php

namespace App\Providers;

use App\Enums\OrderStatus;
use App\Models\Orders;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SidebarProfileProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['user.authenticated.profile.layouts.sidebar'], function ($view) {
            $totalDeposit = Orders::where('status', OrderStatus::COMPLETED)->sum('total');

            $view->with('totalDeposit', $totalDeposit);
        });
    }
}
