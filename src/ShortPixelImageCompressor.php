<?php

namespace Robiussani152\ShortPixelImageCompressor;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Robiussani152\ShortPixelImageCompressor\Events\CompressorCalledEvent;

class ShortPixelImageCompressor
{
    public function __construct()
    {
    }

    public static function compress($imagePath, $interval = 1)
    {
        if (Storage::exists($imagePath)) {
            event(new CompressorCalledEvent($imagePath, $interval));
        }
    }
}
