<?php

namespace Modules\Security\Policies\V1\RolePolicy;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Policies\V1\CleanPolicy\CleanPolicy;

class RolePolicy extends CleanPolicy
{
    /**
     * Get the unique key
     *
     * @return string
     */
    protected function key(): string
    {
        return 'role';
    }
}
