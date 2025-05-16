<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Vendors' => Tab::make()
            ->modifyQueryUsing(function ($query) {
                $query->role('vendor'); // Spatie method
            }),
            'users' => Tab::make()
            ->modifyQueryUsing(function ($query) {
                $query->role('user'); // Spatie method
            }),
        ];
    }   
}
