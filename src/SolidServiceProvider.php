<?php

namespace Terpise\Solid;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Terpise\Solid\Commands\CollectionMakeCommand;
use Terpise\Solid\Commands\ContractMakeCommand;
use Terpise\Solid\Commands\ControllerMakeCommand;
use Terpise\Solid\Commands\MakeCommand;
use Terpise\Solid\Commands\RepositoryMakeCommand;
use Terpise\Solid\Commands\RequestMakeCommand;
use Terpise\Solid\Commands\ResourceMakeCommand;
use Terpise\Solid\Commands\SolidCommand;

class SolidServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->registerRoutes();
//        $this->registerResources();
//        $this->registerMigrations();
        $this->registerPublishing();
        $this->registerCommands();
    }

    /**
     * Register the Passport routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        if (Solid::$registersRoutes) {
            Route::group([
                'as' => 'solid.',
                'prefix' => config('solid.path', 'solid'),
                'namespace' => 'Terpise\Solid\Http\Controllers',
            ], function () {
                $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
            });
        }
    }

    /**
     * Register the Passport resources.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'solid');
    }

    /**
     * Register the Passport migration files.
     *
     * @return void
     */
    protected function registerMigrations()
    {
        if ($this->app->runningInConsole() && Solid::$runsMigrations && ! config('solid.client_uuids')) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
//            $this->publishes([
//                __DIR__.'/../database/migrations' => database_path('migrations'),
//            ], 'solid-migrations');
//
//            $this->publishes([
//                __DIR__.'/../resources/views' => base_path('resources/views/vendor/solid'),
//            ], 'solid-views');
            $this->publishes([
                __DIR__ . '/Commands/stubs' => base_path('stubs'),
            ], 'solid-stubs');

            $this->publishes([
                __DIR__.'/../config/solid.php' => config_path('solid.php'),
            ], 'solid-config');
        }
    }

    /**
     * Register the Passport Artisan commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CollectionMakeCommand::class,
                ContractMakeCommand::class,
                ControllerMakeCommand::class,
                MakeCommand::class,
                RepositoryMakeCommand::class,
                RequestMakeCommand::class,
                ResourceMakeCommand::class,
                SolidCommand::class,
            ]);
        }
    }
}
