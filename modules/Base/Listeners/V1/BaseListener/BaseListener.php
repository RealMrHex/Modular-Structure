<?php

namespace Modules\Base\Listeners\V1\BaseListener;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\InteractsWithQueue;

abstract class BaseListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public ?string $queue = 'v1-default-queue';

    /**
     * Handle the event
     *
     * @param Model $record
     *
     * @return void
     */
    abstract public function handle(Model $record): void;
}
