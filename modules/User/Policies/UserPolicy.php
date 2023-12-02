<?php

namespace Modules\User\Policies;

use Modules\Base\Policies\V1\CleanPolicy\CleanPolicy;

class UserPolicy extends CleanPolicy
{
    /**
     * Get the unique key
     *
     * @return string
     */
    protected function key(): string
    {
        return 'user';
    }
}
