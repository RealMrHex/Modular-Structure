<?php

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

if (!function_exists('v1_role'))
{
    /**
     * Get the role model
     *
     * @return Role
     */
    function v1_role(): Role
    {
        return new Role;
    }
}


if (!function_exists('v1_permission'))
{
    /**
     * Get the permission model
     *
     * @return Permission
     */
    function v1_permission(): Permission
    {
        return new Permission;
    }
}
