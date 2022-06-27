<?php

namespace LaravelRussian\Multidomain\Horizon\MasterSupervisorCommands;

use Laravel\Horizon\MasterSupervisor;
use LaravelRussian\Multidomain\Horizon\SupervisorOptions;
use LaravelRussian\Multidomain\Horizon\SupervisorProcess;
use Laravel\Horizon\MasterSupervisorCommands\AddSupervisor as BaseAddSupervisor;

/**
 * Class AddSupervisor
 *
 * @package LaravelRussian\Multidomain\Horizon\MasterSupervisorCommands
 */
class AddSupervisor extends BaseAddSupervisor
{
    /**
     * Process the command.
     *
     * @param  MasterSupervisor  $master
     * @param  array  $options
     * @return void
     */
    public function process(MasterSupervisor $master, array $options)
    {
        $options = SupervisorOptions::fromArray($options);

        $master->supervisors[] = new SupervisorProcess(
            $options,
            $this->createProcess($master, $options),
            function ($type, $line) use ($master) {
                $master->output($type, $line);
            }
        );
    }
}
