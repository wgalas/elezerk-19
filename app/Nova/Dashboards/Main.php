<?php

namespace App\Nova\Dashboards;

use App\Models\User;
use App\Nova\Metrics\Clients;
use App\Nova\Metrics\Sales;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            Sales::make(),
            Clients::make()
                ->canSee(fn () => auth()->user()->type == User::TYPE_ADMIN),
        ];
    }
}
