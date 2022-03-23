<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class UploadService
{
    public function loadFile(UploadedFile $file):string
    {
        $fileName = $file->hashName();
        $fileLoaded = $file->storeAs('news', $fileName);
        if (!$fileLoaded) {
            throw new \Exception('File wasn\'t uploaded');
        }
        return $fileLoaded;
    }
}
