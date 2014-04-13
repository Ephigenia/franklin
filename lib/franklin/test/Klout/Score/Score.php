<?php

namespace Franklin\test\Klout\Score;

use
	Franklin\test\Scrape\Scrape
	;

class Score extends Scrape
{
	public $name = 'Klout Score';
	
	public $description = 'Tracks the klout score from klout.com';

    public function convertValue($value)
    {
        return (int) $value;
    }
}