<?php

namespace Franklin\test\Bing\Results;

use
	Franklin\test\Scrape\Scrape
	;

class Results extends Scrape
{
	public $name = 'Bing Search Results';
	
	public $description = 'Tracks the number of results found on microsofts search engine Bing';

    public function convertValue($value)
    {
        $value = preg_replace('/[^\d]/', '', $value);
        return (int) $value;
    }
}