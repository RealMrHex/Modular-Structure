<?php

use Modules\Crashlytic\Contracts\V1\CrashService\ICrashService;
use Modules\Crashlytic\Enums\V1\CrashLevel\CrashLevel;
use Modules\Crashlytic\Services\V1\CrashService\CrashService;

if (!function_exists('crash'))
{
    /**
     * Resolve the CrashService
     */
    function crash(): ICrashService
    {
        return new CrashService;
    }
}

if (!function_exists('report'))
{
    /**
     * Directly report a crash using Crash-Service
     */
    function report(Throwable $exception, CrashLevel $crashLevel = CrashLevel::Alert): void
    {
        crash()->report($exception, $crashLevel);
    }
}
