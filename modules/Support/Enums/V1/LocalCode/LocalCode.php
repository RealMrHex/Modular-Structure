<?php

namespace Modules\Support\Enums\V1\LocalCode;

use Modules\Support\Traits\V1\CleanEnum\CleanEnum;

enum LocalCode: int
{
    use CleanEnum;

    case None       = 0;
    case Ok         = 1;
    case Authorized = 2;

    /**
     * Make code negative
     */
    public function negative(): int
    {
        return -$this->value;
    }
}
