<?php

namespace Modules\User\Filament\Manager\Resources;

use Modules\Support\Filament\Resources\ProResource\ProResource;

class UserResource extends ProResource
{
    /**
     * Get the model
     *
     * @return string
     */
    public static function getModel(): string
    {
        return v1_user()->model();
    }
}
