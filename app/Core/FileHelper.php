<?php

declare(strict_types=1);

namespace App\Core;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileHelper
{
    public static function storeFile($file, $disk, $fileName)
    {
        $fileName = Str::lower($fileName);
        return Storage::disk($disk)->putFileAs('products/' . $fileName . '/', $file, $fileName . '-' . Carbon::now()->format('d/m/Y-His'));
    }
}
