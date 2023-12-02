<?php

namespace Modules\User\Observers\V1\User;

use Illuminate\Database\Eloquent\Model;
use Modules\Support\Enums\V1\SystemEvent\SystemEvent;

class UserObserver
{
    /**
     * Handle user created event
     *
     * @param Model $user
     *
     * @return void
     */
    public function created(Model $user): void
    {
        SystemEvent::NewUserRegistered->fire($user);
    }
}
