<?php

namespace Modules\Profile\Entities\V1\Profile;

use Modules\Base\Entities\V1\Fields\BaseFields\BaseFields;

class ProfileFields extends BaseFields
{
    public const ID              = 'id';
    public const USER_ID         = 'user_id';
    public const AVATAR          = 'avatar_url';
    public const FIRST_NAME      = 'first_name';
    public const LAST_NAME       = 'last_name';
    public const FULL_NAME       = 'full_name';
    public const FATHER_NAME     = 'father_name';
    public const GENDER          = 'gender';
    public const BIRTH_DATE      = 'birth_date';
    public const NATIONAL_CODE   = 'national_code';
    public const IDENTIFY_NUMBER = 'identity_number';
    public const ADDRESS         = 'address';
    public const PHONE           = 'phone';
    public const POSTAL_CODE     = 'postal_code';
    public const PROVINCE        = 'province';
    public const CITY            = 'city';
}
