<?php

use Modules\User\Contracts\V1\UserRepository\UserRepository;

if (! function_exists('v1_user')) {
    /**
     * Get the user repo.
     */
    function v1_user(): UserRepository
    {
        return resolve(UserRepository::class);
    }
}
