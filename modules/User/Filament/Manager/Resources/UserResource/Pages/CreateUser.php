<?php

namespace Modules\User\Filament\Manager\Resources\UserResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\User\Filament\Manager\Resources\UserResource;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
