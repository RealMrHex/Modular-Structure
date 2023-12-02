<?php

namespace Modules\Support\Enums\V1\HttpMethod;

use Modules\Support\Traits\V1\CleanEnum\CleanEnum;

enum HttpMethod: string
{
    use CleanEnum;

    case Post   = 'post';
    case Get    = 'get';
    case Put    = 'put';
    case Patch  = 'patch';
    case Delete = 'delete';
    case Head   = 'head';
}
