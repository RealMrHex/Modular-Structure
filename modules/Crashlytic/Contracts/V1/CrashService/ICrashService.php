<?php

namespace Modules\Crashlytic\Contracts\V1\CrashService;

use Modules\Crashlytic\Enums\V1\CrashLevel\CrashLevel;
use Throwable;

interface ICrashService
{
    /**
     * Report an exception
     */
    public function report(Throwable $exception, CrashLevel $crashLevel = CrashLevel::Alert): void;

    /**
     * Handle the crash
     */
    public function handle(): void;
}
