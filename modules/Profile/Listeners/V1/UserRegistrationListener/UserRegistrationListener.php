<?php

namespace Modules\Profile\Listeners\V1\UserRegistrationListener;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Listeners\V1\BaseListener\BaseListener;
use Modules\Profile\Entities\V1\Profile\ProfileFields;
use Modules\Support\Enums\V1\SystemEvent\SystemEvent;
use Modules\User\Entities\V1\User\UserFields;

class UserRegistrationListener extends BaseListener
{
    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public ?string $queue = SystemEvent::NewUserRegistered->value;

    /**
     * Handle the event
     *
     * @param Model $record
     *
     * @return void
     */
    public function handle(Model $record): void
    {
        // todo: Handle job failures.

        v1_profile()->create(
            [
                ProfileFields::USER_ID => $record->{UserFields::ID},
            ]
        );
    }
}
