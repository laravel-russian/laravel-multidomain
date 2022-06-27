<?php

namespace LaravelRussian\Multidomain\Foundation\Providers;

use App;
use LaravelRussian\Multidomain\Foundation\Console\ListDomainCommand;
use LaravelRussian\Multidomain\Foundation\Console\RemoveDomainCommand;
use Illuminate\Support\ServiceProvider;
use LaravelRussian\Multidomain\Foundation\Console\DomainCommand;
use LaravelRussian\Multidomain\Foundation\Console\AddDomainCommand;
use LaravelRussian\Multidomain\Foundation\Console\UpdateEnvDomainCommand;

class DomainConsoleServiceProvider extends ServiceProvider
{

    protected $defer = false;


    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $commands = [
        'Domain',
        'AddDomain',
        'RemoveDomain',
        'UpdateEnvDomain',
        'ListDomain',
    ];


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias('artisan', \LaravelRussian\Multidomain\Console\Application::class);


        foreach ($this->commands as $command) {
            $this->{"register{$command}Command"}();
        }

        $this->commands(
            "command.domain",
            "command.domain.add",
            "command.domain.remove",
            "command.domain.update_env",
            "command.domain.list"
        );
    }


    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/domain.php' => config_path('domain.php'),
        ]);
    }


    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerDomainCommand()
    {
        $this->app->singleton('command.domain', function () {
            return new DomainCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerAddDomainCommand()
    {
        $this->app->singleton('command.domain.add', function ($app) {
            return new AddDomainCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerRemoveDomainCommand()
    {
        $this->app->singleton('command.domain.remove', function ($app) {
            return new RemoveDomainCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerUpdateEnvDomainCommand()
    {
        $this->app->singleton('command.domain.update_env', function ($app) {
            return new UpdateEnvDomainCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerListDomainCommand()
    {
        $this->app->singleton('command.domain.list', function ($app) {
            return new ListDomainCommand($app['files']);
        });
    }
}
