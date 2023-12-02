<?php

namespace Modules\User\Repositories\V1\UserRepository;

use Modules\Base\Repositories\V1\BaseRepository\BaseRepository;
use Modules\User\Contracts\V1\UserRepository\UserRepository;
use Modules\User\Entities\V1\User\User;

class UserEloquentRepository extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * Get system user id.
     */
    public function systemId(): int
    {
        return 1;
    }
}
