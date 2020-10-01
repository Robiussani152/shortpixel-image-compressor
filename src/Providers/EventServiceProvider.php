<?php

namespace Robiussani152\ShortPixelImageCompressor\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Robiussani152\ShortPixelImageCompressor\Events\CompressorCalledEvent;
use Robiussani152\ShortPixelImageCompressor\Listeners\CompressorCalledListener;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        CompressorCalledEvent::class => [
            CompressorCalledListener::class
        ]
    ];

    public function boot()
    {
        parent::boot();
    }
}
