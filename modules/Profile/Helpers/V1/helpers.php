<?php

use Modules\Profile\Contracts\V1\ProfileRepository\ProfileRepository;

if (!function_exists('v1_profile'))
{
    /**
     * Get the profile repo.
     */
    function v1_profile(): ProfileRepository
    {
        return resolve(ProfileRepository::class);
    }
}
