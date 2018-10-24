<?php

namespace Watson\Sitemap;

use Illuminate\Support\ServiceProvider;

class SitemapServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            Commands\InstallCommand::class,
            Commands\GenerateCommand::class,
            Commands\SubmitCommand::class
        );
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../views', 'sitemap');

        if ( ! $this->app->routesAreCached()) {
            require __DIR__ . '/../../routes.php';
        }
    }
}
