<?php

namespace App\Core\Application;

use Illuminate\Foundation\Application as BaseApplication;
use Illuminate\Support\Carbon;

class Application extends BaseApplication
{
    /**
     * The Application version.
     *
     * @var string
     */
    const APPLICATION_VERSION = '1.0.0';
    const PUBLICATION_DATE    = '2018-05-16 09:13:39';

    /**
     * Create a new Illuminate application instance.
     *
     * @param  string|null  $basePath
     * @return void
     */
    public function __construct($basePath = null)
    {
        parent::__construct($basePath);
    }

    /**
     * Get the version number of the application.
     *
     * @param bool $application
     * @param bool $date
     * @return string
     */
    public function version($application = false, $date = false)
    {
        $v = $application ? static::APPLICATION_VERSION : parent::VERSION;
        $d = $date ? Carbon::parse(static::PUBLICATION_DATE)->diffForHumans() : false;
        return $d ? $v . ' -> ' . sprintf('publish it %s', $d) : $v;
    }

    public function publishDate($date = false)
    {
        $d = $date ? Carbon::parse(static::PUBLICATION_DATE)->format('d-m-Y') : false;
        $diff = Carbon::parse(static::PUBLICATION_DATE)->diffForHumans();

        $d = sprintf('publish it %s - %s', $diff, $d);

        //$d = $date ? Carbon::parse(static::PUBLICATION_DATE)->diffForHumans() : false;

        return $d;
    }

    /**
     * Register the basic bindings into the container.
     *
     * @return void
     */
    protected function registerBaseBindings()
    {
        parent::registerBaseBindings();

        static::setInstance($this);

        $this->instance('app', $this);
    }

    /**
     * Bind all of the application paths in the container.
     *
     * @return void
     */
    protected function bindPathsInContainer()
    {
        //$this->instance('path.base', $this->basePath());

        parent::bindPathsInContainer();
    }

    /**
     * Register the core class aliases in the container.
     *
     * @return void
     */
    public function registerCoreContainerAliases()
    {
        foreach ([
             'app' => [\App\Core\Application\Application::class],

        ] as $key => $aliases) {
            foreach ($aliases as $alias) {
                $this->alias($key, $alias);
            }
        }

        parent::registerCoreContainerAliases();
    }

}