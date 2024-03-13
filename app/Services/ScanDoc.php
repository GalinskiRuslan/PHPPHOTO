<?php

namespace App\Services;


use thiagoalessio\TesseractOCR\TesseractOCR;

class ScanDoc
{
    public function scan($image)
    {
        // dd(storage_path($image));
        $tesseract = (new TesseractOCR(storage_path($image)))->lang('rus', 'eng', 'kaz')->run();

        # Для просмотра доступных языков
        // foreach ((new TesseractOCR())->availableLanguages() as $lang) echo $lang;

        dd($tesseract);
    }
}
