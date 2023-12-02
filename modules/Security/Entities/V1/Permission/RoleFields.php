<?php

namespace Modules\Security\Entities\V1\Permission;

use Modules\Base\Entities\V1\Fields\BaseFields\BaseFields;

class RoleFields extends BaseFields
{
    public const ID           = 'id';
    public const NAME         = 'name';
    public const DISPLAY_NAME = 'display_name';
    public const GUARD_NAME   = 'guard_name';
}
