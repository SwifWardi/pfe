<?php

namespace App\Filament\Widgets;

use App\Models\Coupon;
use App\Models\product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class userStat extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('User State' ,User::count())
            ->description('Total Client in this App')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([1,3,5,9,8,6,5,8])
            ->color('success'),

            Stat::make('Product Data' ,product::count())
            ->description('Products that Are Active')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->chart([50,60,58,10,20,48,23,2])
            ->color('danger'),

            Stat::make('Active Offers' ,Coupon::count())
            ->description('Best Deals That We Got')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([1,3,5,9,8,6,5,8])
            ->color('success')
        ];
    }
}
