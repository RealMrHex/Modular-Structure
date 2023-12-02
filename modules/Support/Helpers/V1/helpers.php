<?php

if (!function_exists('disk'))
{
    /**
     * Get the default disk name
     * @return string
     */
    function disk(): string
    {
        return config('filesystems.default');
    }
}
