<?php

namespace DevCraft\Directives\Src;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

/**
 * Class DevcraftBladeServiceProvider
 */
class DevcraftBladeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerDirectives();

    }

    /**
     * Register all directives.
     *
     * @return void
     */
    public function registerDirectives()
    {
        $directives = require __DIR__.'/directives.php';

        collect($directives)->each(function ($item, $key) {
            Blade::directive($key, $item);
        });
    }

}
