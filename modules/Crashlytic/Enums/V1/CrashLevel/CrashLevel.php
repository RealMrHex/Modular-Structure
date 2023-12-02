<?php

namespace Modules\Crashlytic\Enums\V1\CrashLevel;

use Modules\Support\Traits\V1\CleanEnum\CleanEnum;

enum CrashLevel: string
{
    use CleanEnum;

    case Emergency = 'emergency';
    case Alert     = 'alert';
    case Critical  = 'critical';
    case Error     = 'error';
    case Warning   = 'warning';
    case Notice    = 'notice';
    case Info      = 'info';
    case Debug     = 'debug';
}
