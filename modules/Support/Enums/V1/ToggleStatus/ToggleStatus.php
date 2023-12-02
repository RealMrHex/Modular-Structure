<?php

namespace Modules\Support\Enums\V1\ToggleStatus;

use Modules\Support\Traits\V1\CleanEnum\CleanEnum;

enum ToggleStatus: int
{
    use CleanEnum;

    case Enabled  = 1;
    case Disabled = 0;
}
