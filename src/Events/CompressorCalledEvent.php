<?php

namespace Robiussani152\ShortPixelImageCompressor\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class CompressorCalledEvent
{
    use Dispatchable, SerializesModels;

    public $imagePath;
    public $interval;
    public function __construct($imagePath, $interval)
    {
        $this->imagePath = $imagePath;
        $this->interval = $interval;
    }
}
