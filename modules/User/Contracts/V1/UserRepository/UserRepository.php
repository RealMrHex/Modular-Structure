<?php

namespace Modules\User\Contracts\V1\UserRepository;

use Modules\Base\Contracts\V1\BaseRepositoryInterface\BaseRepositoryInterface;

interface UserRepository extends BaseRepositoryInterface
{
    /**
     * Get system user id.
     */
    public function systemId(): int;
}
