<?php

namespace Modules\User\Entities\V1\User;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Modules\Base\Entities\V1\BaseAuthenticatableModel;
use Modules\User\Database\Factories\V1\UserFactory\UserFactory;
use Modules\User\Enums\V1\AccountStatus\AccountStatus;
use Modules\User\Enums\V1\AccountType\AccountType;
use Spatie\Permission\Traits\HasRoles;

class User extends BaseAuthenticatableModel
{
    use HasApiTokens,
        HasFactory,
        UserModifiers,
        UserRelations,
        UserScopes,
        HasRoles;

    /**
     * Model guard name
     *
     * @var string
     */
    protected string $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        #UserFields::ID,
        UserFields::MOBILE,
        UserFields::EMAIL,
        UserFields::USERNAME,
        UserFields::PASSWORD,
        #UserFields::PASSWORD_CONFIRMATION,
        #UserFields::CURRENT_PASSWORD,
        UserFields::MESSAGE,
        UserFields::ACCOUNT_TYPE,
        UserFields::ACCOUNT_STATUS,
        UserFields::LIMITATION_END_DATE,
        UserFields::MOBILE_VERIFIED_AT,
        UserFields::EMAIL_VERIFIED_AT,
        UserFields::FIRST_LOGIN_AT,
        UserFields::FIRST_LOGIN_IP,
        UserFields::LAST_LOGIN_AT,
        UserFields::LAST_LOGIN_IP,
        UserFields::REMEMBER_TOKEN,
        #UserFields::ACCESS_TOKEN,
        UserFields::CREATED_AT,
        UserFields::UPDATED_AT,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        UserFields::PASSWORD,
        UserFields::REMEMBER_TOKEN,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        UserFields::ACCOUNT_TYPE   => AccountType::class,
        UserFields::ACCOUNT_STATUS => AccountStatus::class,
    ];

    /**
     * Get a new factory instance for the model.
     *
     * @param callable|array|int|null $count
     * @param callable|array          $state
     *
     * @return Factory<static>
     */
    public static function factory($count = null, $state = []): Factory
    {
        return UserFactory::new();
    }
}
