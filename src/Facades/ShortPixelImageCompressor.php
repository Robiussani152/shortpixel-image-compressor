<?php

namespace Robiussani152\ShortPixelImageCompressor\Facades;

use Illuminate\Support\Facades\Facade;

class ShortPixelImageCompressor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shortPixelImageCompressor';
    }
}
