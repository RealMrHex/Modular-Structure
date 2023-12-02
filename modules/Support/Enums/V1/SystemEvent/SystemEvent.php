<?php

namespace Modules\Support\Enums\V1\SystemEvent;

enum SystemEvent: string
{
    case NewUserRegistered = 'new-user-registered';

    /**
     * Call the system event
     */
    public function fire(...$params): void
    {
        event($this->value, ...$params);
    }
}
