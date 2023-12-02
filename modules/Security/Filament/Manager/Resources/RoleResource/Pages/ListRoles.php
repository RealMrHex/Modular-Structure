<?php

namespace Modules\Security\Filament\Manager\Resources\RoleResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\Security\Filament\Manager\Resources\RoleResource;

class ListRoles extends ListRecords
{
    protected static string $resource = RoleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
