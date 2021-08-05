<?php

namespace App\Actions\File;

use Illuminate\Support\Facades\Storage;

class RegisterInFileAction
{
    public static function handle($text, $name, $disk)
    {
        Storage::disk($disk)->append($name, $text);
    }
}
