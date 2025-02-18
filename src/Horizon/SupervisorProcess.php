<?php

namespace LaravelRussian\Multidomain\Horizon;

use LaravelRussian\Multidomain\Horizon\MasterSupervisorCommands\AddSupervisor;
use Laravel\Horizon\Contracts\HorizonCommandQueue;
use Laravel\Horizon\MasterSupervisor;
use Laravel\Horizon\SupervisorProcess as BaseSupervisorProcess;

/**
 * Class SupervisorProcess
 *
 * @package LaravelRussian\Multidomain\Horizon
 */
class SupervisorProcess extends BaseSupervisorProcess
{
    /**
     * Re-provision this supervisor process based on the provisioning plan.
     *
     * @return void
     */
    protected function reprovision()
    {
        app(HorizonCommandQueue::class)->push(
            MasterSupervisor::commandQueue(),
            AddSupervisor::class,
            $this->options->toArray()
        );
    }
}
