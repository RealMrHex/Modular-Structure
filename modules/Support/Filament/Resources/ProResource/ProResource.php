<?php

namespace Modules\Support\Filament\Resources\ProResource;

use Filament\Resources\Resource;
use Modules\Support\Traits\V1\CleanResource\CleanResource;

abstract class ProResource extends Resource
{
    use CleanResource;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
}
