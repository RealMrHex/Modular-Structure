<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;
use Modules\User\Entities\V1\User\UserFields;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array<int, string>
     */
    protected $except = [
        UserFields::CURRENT_PASSWORD,
        UserFields::PASSWORD,
        UserFields::PASSWORD_CONFIRMATION,
    ];
}
