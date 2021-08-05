<?php

namespace App\Actions\File;

class DeleteFilesAction
{
    public static function handle($dir, $deleteFile = false)
    {
        if (!$deleteFile) {
            return array_map('unlink', glob(storage_path($dir) . "/*"));
        }
        
        return unlink($dir);
    }
}
