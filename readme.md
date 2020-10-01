# Image compressor package using short pixel api for laravel

<!-- [![Version](https://poser.pugx.org/robiussani152/shortpixel-image-compressor/v/stable.svg)](https://github.com/robiussani152/shortpixel-image-compressor/releases)
[![Downloads](https://poser.pugx.org/robiussani152/shortpixel-image-compressor/d/total.svg)](https://github.com/robiussani152/shortpixel-image-compressor) -->

This package is designed for compress uploaded image.

## Requirements

1. At least laravel v7
2. Http client

## Necessary steps

### 1. Configure `filessystem.php`

Set `FILESYSTEM_DRIVER` to `public`

### 2. Storage link command

Run

```bash
php artisan storage:link
```

### 3. Configure queue to `Database` check it from [Here](https://laravel.com/docs/7.x/queues#driver-prerequisites)

## Getting Started

### 1. Install

Run the following command:

```bash
composer require robiussani152/shortpixel-image-compressor
```

### 2. Register (for Laravel < 5.5)

Register the service provider in `config/app.php`

```php
Robiussani152\ShortPixelImageCompressor\ShortPixelImageCompressorServiceProvider::class,
```

Add alias if you want to use the facade.

```php
'ShortPixelImageCompressor' => Robiussani152\ShortPixelImageCompressor\Facades\ShortPixelImageCompressor::class,
```

## Usage

You can use the facade `

```bash
ShortPixelImageCompressor::compress('path_to_the_image.extension');
```

## License

The MIT License (MIT). Please see [LICENSE](LICENSE) for more information.
