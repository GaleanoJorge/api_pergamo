<?php

namespace App\Actions\File;

use Madnest\Madzipper\Facades\Madzipper;

class CompressFilesZipAction
{
    public static function handle($disk, $destiny, $name)
    {
        $files = glob($disk);
        $routeDestiny = $destiny . '/' . $name;
        Madzipper::make($routeDestiny)->add($files)->close();

        return $routeDestiny;
    }
}
