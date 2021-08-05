<?php

namespace App\Actions\File;

use Illuminate\Support\Facades\Storage;

class CreateFileOfBinaryAction
{
    public static function handle($binary, $name, $disk)
    {
        Storage::disk($disk)->put($name, $binary);
    }
}
