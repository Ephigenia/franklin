<?php

namespace Franklin\test\Alexa\TrafficRank;

use
	Franklin\test\Scrape\Scrape
	;

class TrafficRank extends Scrape
{
	public $name = 'Traffic rank on alexa.com';
	
	public $description = 'Tracks the rank of an host on alexa.com';

    public function convertValue($value)
    {
        return (int) preg_replace('/[^\d]/', '', $value);
    }
}