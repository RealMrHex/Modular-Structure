<?php

namespace Modules\Profile\Entities\V1\Profile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Entities\V1\BaseModel;
use Modules\User\Enums\V1\Gender\Gender;

class Profile extends BaseModel
{
    use HasFactory,
        ProfileModifiers,
        ProfileRelations,
        ProfileScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        #ProfileFields::ID,
        ProfileFields::USER_ID,
        ProfileFields::AVATAR,
        ProfileFields::FIRST_NAME,
        ProfileFields::LAST_NAME,
        #ProfileFields::FULL_NAME,
        ProfileFields::FATHER_NAME,
        ProfileFields::GENDER,
        ProfileFields::BIRTH_DATE,
        ProfileFields::NATIONAL_CODE,
        ProfileFields::IDENTIFY_NUMBER,
        ProfileFields::ADDRESS,
        ProfileFields::PHONE,
        ProfileFields::POSTAL_CODE,
        ProfileFields::PROVINCE,
        ProfileFields::CITY,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        ProfileFields::GENDER => Gender::class,
    ];
}
