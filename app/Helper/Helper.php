<?php

namespace App\Helper;

use Storage;

class Helper
{
    public function getImage($name)
    {
        $filename = $name;

        $dir = '/';
        $recursive = false; // Get subdirectories also?
        $contents = collect(Storage::disk('google')->listContents($dir, $recursive));

        $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
            ->first(); // there can be duplicate file names!

        //return $file; // array with file info

        return $file['path'];
    }
}