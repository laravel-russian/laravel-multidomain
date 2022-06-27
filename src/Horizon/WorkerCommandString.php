<?php

namespace LaravelRussian\Multidomain\Horizon;

use Laravel\Horizon\WorkerCommandString as BaseWorkerCommandString;
use Laravel\Horizon\SupervisorOptions;

/**
 * Class WorkerCommandString
 *
 * @package LaravelRussian\Multidomain\Horizon
 */
class WorkerCommandString extends BaseWorkerCommandString
{
    /**
     * Get the additional option string for the command.
     *
     * @param  SupervisorOptions  $options
     * @return string
     */
    public static function toOptionsString(SupervisorOptions $options)
    {
        return QueueCommandString::toWorkerOptionsString($options);
    }
}
