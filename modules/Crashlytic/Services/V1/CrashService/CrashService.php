<?php

namespace Modules\Crashlytic\Services\V1\CrashService;

use Illuminate\Support\Facades\Log;
use Modules\Base\Services\V1\BaseService\BaseService;
use Modules\Crashlytic\Contracts\V1\CrashService\ICrashService;
use Modules\Crashlytic\Enums\V1\CrashLevel\CrashLevel;
use Throwable;

class CrashService extends BaseService implements ICrashService
{
    /**
     * Target exception
     */
    protected Throwable $exception;

    /**
     * Log Level
     */
    protected CrashLevel $crashLevel;

    /**
     * Report an exception
     */
    public function report(Throwable $exception, CrashLevel $crashLevel = CrashLevel::Alert): void
    {
        $this->exception = $exception;
        $this->crashLevel = $crashLevel;
        $this->handle();
    }

    /**
     * Handle the crash
     */
    public function handle(): void
    {
        $this->logIt();
        $this->reportToSentry();
    }

    /**
     * Log the crash
     */
    protected function logIt(): void
    {
        Log::{$this->crashLevel->value}($this->exception->getMessage());
    }

    /**
     * Report the exception to Sentry
     */
    protected function reportToSentry(): void
    {
        if (app()->bound('sentry'))
            app('sentry')->captureException($this->exception);
    }
}
