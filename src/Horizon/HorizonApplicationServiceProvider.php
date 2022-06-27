<?php

namespace LaravelRussian\Multidomain\Horizon;

use LaravelRussian\Multidomain\Horizon\Console\HorizonCommand;
use LaravelRussian\Multidomain\Horizon\Console\SupervisorCommand;
use LaravelRussian\Multidomain\Horizon\Console\TimeoutCommand;
use Laravel\Horizon\Console\HorizonCommand as BaseHorizonCommand;
use Laravel\Horizon\Console\SupervisorCommand as BaseSupervisorCommand;
use Laravel\Horizon\Console\TimeoutCommand as BaseTimeoutCommand;
use Laravel\Horizon\HorizonApplicationServiceProvider as BaseHorizonApplicationServiceProvider;

/**
 * Class HorizonApplicationServiceProvider
 *
 * @package LaravelRussian\Multidomain\Horizon
 */
class HorizonApplicationServiceProvider extends BaseHorizonApplicationServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        $this->app->bind(BaseSupervisorCommand::class, SupervisorCommand::class);
        $this->app->bind(BaseHorizonCommand::class, HorizonCommand::class);
        $this->app->bind(BaseTimeoutCommand::class, TimeoutCommand::class);
    }
}
