<?php

namespace Robiussani152\ShortPixelImageCompressor;

use Illuminate\Support\ServiceProvider;
use Robiussani152\ShortPixelImageCompressor\Providers\EventServiceProvider;

class ShortPixelImageCompressorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('shortPixelImageCompressor', function ($app) {
            return new ShortPixelImageCompressor();
        });

        $this->app->register(EventServiceProvider::class);
    }

    public function boot()
    {
    }
}
