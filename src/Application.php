<?php

namespace Run;

use Illuminate\Container\Container;
use Illuminate\Events\EventServiceProvider;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application as BaseApplication;
use Illuminate\Foundation\PackageManifest;
use Illuminate\Log\LogServiceProvider;
use Illuminate\Routing\RoutingServiceProvider;

class Application extends BaseApplication
{

    const VERSION = '1.0.2';


    /**
     * Create a new Run application instance.
     *
     * @param  string|null  $basePath
     * @return void
     */
    public function __construct($basePath = null)
    {

        if ($basePath) {
            $this->setBasePath($basePath);
        }

        $this->registerBaseBindings();
        $this->registerBaseServiceProviders();
        $this->registerCoreContainerAliases();

        $this->registerErrorHandling();
     }

    /**
     * Bootstrap the application container.
     *
     * @return void
     */
    protected function registerBaseBindings()
    {
        static::setInstance($this);

        $this->instance('app', $this);
        $this->instance(self::class, $this);
        $this->instance(Container::class, $this);


        $this->singleton(PackageManifest::class, function () {
            return new PackageManifest(
                new Filesystem, $this->basePath(), $this->getCachedPackagesPath()
            );
        });

    }





    private function registerErrorHandling()
    {
        error_reporting(-1);

        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();

    }

    protected function registerBaseServiceProviders()
    {
        $this->register(new EventServiceProvider($this));
        $this->register(new LogServiceProvider($this));
        $this->register(new RoutingServiceProvider($this));

    }


}