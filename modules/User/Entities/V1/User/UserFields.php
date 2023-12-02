<?php

namespace Modules\User\Entities\V1\User;

use Modules\Base\Entities\V1\Fields\BaseFields\BaseFields;

class UserFields extends BaseFields
{
    public const ID                    = 'id';
    public const MOBILE                = 'mobile';
    public const EMAIL                 = 'email';
    public const USERNAME              = 'username';
    public const PASSWORD              = 'password';
    public const PASSWORD_CONFIRMATION = self::PASSWORD . '_confirmation';
    public const CURRENT_PASSWORD      = 'current_password';
    public const MESSAGE               = 'message';
    public const ACCOUNT_TYPE          = 'account_type';
    public const ACCOUNT_STATUS        = 'account_status';
    public const LIMITATION_END_DATE   = 'limitation_end_date';
    public const MOBILE_VERIFIED_AT    = 'mobile_verified_at';
    public const EMAIL_VERIFIED_AT     = 'email_verified_at';
    public const FIRST_LOGIN_AT        = 'first_login_at';
    public const FIRST_LOGIN_IP        = 'first_login_ip';
    public const LAST_LOGIN_AT         = 'last_login_at';
    public const LAST_LOGIN_IP         = 'last_login_ip';
    public const REMEMBER_TOKEN        = 'remember_token';
    public const ACCESS_TOKEN          = 'token';
    public const ROLES                 = 'roles';
    public const PERMISSIONS           = 'permissions';
    public const PROJECTS              = 'projects';
}
