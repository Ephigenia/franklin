<?php

namespace Franklin\test\PlayStore\ApplicationInfo;

use
    Franklin\test\Scrape\Scrape
    ;

class ApplicationInfo extends Scrape
{
    public $name = 'Play Store Application Information';
    
    public $description = 'Tracks kpis of applications in the google play store';
    
    public function convertValue($value)
    {
        if (preg_match('/\d[,\.]\d/', $value)) {
            return (float) str_replace(',', '.', $value);
        }
        return (integer) preg_replace('/[^\d]+/', '', $value);
    }
}