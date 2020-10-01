<?php

namespace Robiussani152\ShortPixelImageCompressor\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Robiussani152\ShortPixelImageCompressor\Events\CompressorCalledEvent;
use Robiussani152\ShortPixelImageCompressor\Jobs\CallShortPixelApi;

class CompressorCalledListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(CompressorCalledEvent $event)
    {
        $shortPixelApi = 'https://shortpixel.com/file-upload';
        $response = Http::attach(
            'file',
            file_get_contents(Storage::url($event->imagePath)),
            'photo.jpg'
        )->post($shortPixelApi, [
            'compressionType' => 1
        ]);
        $firstResponse = $response->json();

        if ($firstResponse and key_exists(0, $firstResponse)) {
            CallShortPixelApi::dispatch($event->imagePath, $firstResponse[0]['Data']['OriginalURL'])
                ->delay(now()->addMinutes($event->interval));
        }
    }
}
