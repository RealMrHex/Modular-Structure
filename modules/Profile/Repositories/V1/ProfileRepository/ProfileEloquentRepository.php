<?php

namespace Modules\Profile\Repositories\V1\ProfileRepository;

use Modules\Base\Repositories\V1\BaseRepository\BaseRepository;
use Modules\Profile\Contracts\V1\ProfileRepository\ProfileRepository;
use Modules\Profile\Entities\V1\Profile\Profile;

class ProfileEloquentRepository extends BaseRepository implements ProfileRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Profile::class;
    }
}
