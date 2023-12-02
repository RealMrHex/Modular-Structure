<?php

namespace Modules\User\Enums\V1\AccountStatus;

use Illuminate\Support\Collection;
use Modules\Support\Traits\V1\CleanEnum\CleanEnum;

enum AccountStatus: int
{
    use CleanEnum;

    case Free       = 0;
    case Limited    = 1;
    case Banned     = 2;
    case Removed    = 3;
    case Classified = 4;

    /**
     * Get safe pairs to create
     */
    public static function createablePairs(): Collection
    {
        return collect(self::cases())
            ->reject(fn($case) => $case === self::Classified)
            ->mapWithKeys(fn($case) => [$case->value => $case->trans()])
        ;
    }
}
