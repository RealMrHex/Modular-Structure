<?php

namespace Modules\Base\Repositories\V1\BaseRepository;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository as L5Repository;
use Prettus\Repository\Traits\CacheableRepository;

abstract class BaseRepository extends L5Repository implements CacheableInterface
{
    use CacheableRepository;
}
