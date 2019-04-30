<?php

namespace Zoom;

use Zoom\Console\InstallCommand;
use Zoom\Console\PublishCommand;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ZoomServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->handleConfig();
        $this->handleRoutes();
        $this->handleMigrations();
        $this->handlePublishing();
        $this->handleResources();
        $this->handleCommands();
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function handleRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/zoom.php');
        });
    }

    /**
     * Get the Zoom route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            'namespace'  => 'Zoom\Http\Controllers',
            'prefix'     => 'zoom',
            'middleware' => config('zoom.middleware'),
        ];
    }

    /**
     * Register the resources.
     *
     * @return void
     */
    private function handleResources()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'zoom');
    }

    /**
     * Register the package's migrations.
     *
     * @return void
     */
    private function handleMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    private function handlePublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/zoom'),
            ], 'zoom-assets');

            $this->publishes([
                __DIR__ . '/../config/zoom.php' => config_path('zoom.php'),
            ], 'zoom-config');

            $this->publishes([
                __DIR__.'/../stubs/providers/ZoomServiceProvider.stub' => app_path(
                    'Providers/ZoomServiceProvider.php'
                ),
            ], 'zoom-provider');
        }
    }

    /**
     * @return void
     */
    private function handleConfig(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/zoom.php',
            'zoom'
        );
    }

    /**
     * @return void
     */
    private function handleCommands(): void
    {
        $this->commands([
            InstallCommand::class,
            PublishCommand::class,
        ]);
    }
}
