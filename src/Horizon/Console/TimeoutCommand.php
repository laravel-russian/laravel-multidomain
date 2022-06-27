<?php

namespace LaravelRussian\Multidomain\Horizon\Console;

use Laravel\Horizon\MasterSupervisor;
use LaravelRussian\Multidomain\Horizon\ProvisioningPlan;
use Laravel\Horizon\Console\TimeoutCommand as BaseTimeoutCommand;

/**
 * Class TimeoutCommand
 *
 * @package LaravelRussian\Multidomain\Horizon\Console
 */
class TimeoutCommand extends BaseTimeoutCommand
{
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $plan = ProvisioningPlan::get(MasterSupervisor::name(), $this->option('domain'))->plan;

        $this->line(collect($plan[$this->argument('environment')] ?? [])->max('timeout') ?? 60);
    }
}
