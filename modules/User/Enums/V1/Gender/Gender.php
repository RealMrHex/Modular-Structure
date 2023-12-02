<?php

namespace Modules\User\Enums\V1\Gender;

use Modules\Support\Traits\V1\CleanEnum\CleanEnum;

enum Gender: int
{
    use CleanEnum;

    case PreferNotToSay = 0;
    case Male           = 1;
    case Female         = 2;
}
