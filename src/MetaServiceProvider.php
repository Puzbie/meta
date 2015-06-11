<?php
namespace Puzbie\Meta;

use Illuminate\Support\ServiceProvider;

/**
 * Class MetaServiceProvider
 *
 * @package Puzbie\Meta
 */
class MetaServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('meta', function ()
        {
            return new Meta;
        });
    }
}
