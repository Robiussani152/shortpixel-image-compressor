<?php

namespace Robiussani152\ShortPixelImageCompressor\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CallShortPixelApi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $imagePath;
    public $orginalUrl;

    public function __construct($imagePath, $orginalUrl)
    {
        $this->imagePath = $imagePath;
        $this->orginalUrl = $orginalUrl;
    }

    public function handle()
    {
        $newResponse = Http::asForm()->post('https://shortpixel.com/file-upload', [
            'compressionType' => 1,
            'fileURL' => $this->orginalUrl
        ]);
        $secondResponse = $newResponse->json();
        if (key_exists(0, $secondResponse) and key_exists('Data', $secondResponse[0]) and key_exists('LossyURL', $secondResponse[0]['Data'])) {
            $lossyUrl = $secondResponse[0]['Data']['LossyURL'];
            Storage::delete($this->imagePath);
            Storage::put($this->imagePath, file_get_contents($lossyUrl));
        }
    }
}
