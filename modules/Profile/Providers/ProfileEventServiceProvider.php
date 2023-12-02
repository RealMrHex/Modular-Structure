<?php

namespace Modules\Profile\Providers;

use Modules\Base\Providers\V1\BaseEventServiceProvider\BaseEventServiceProvider;
use Modules\Profile\Listeners\V1\UserRegistrationListener\UserRegistrationListener;
use Modules\Support\Enums\V1\SystemEvent\SystemEvent;

class ProfileEventServiceProvider extends BaseEventServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array<string, array<int, string>>
     */
    protected $listen = [
        SystemEvent::NewUserRegistered->value => [UserRegistrationListener::class],
    ];
}
