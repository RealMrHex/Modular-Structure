<?php

namespace Modules\User\Entities\V1\User;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Modules\Profile\Entities\V1\Profile\ProfileFields;

trait UserModifiers
{
    public function name(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->profile->{ProfileFields::FULL_NAME} ?? __('Unknown User')
        );
    }
}
