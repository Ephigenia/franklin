<?php

namespace Franklin\test\Twitter\Followers;

use
	Franklin\test\Scrape\Scrape
	;

class Followers extends Scrape
{
	public $name = 'Twitter Followers Count';
	
	public $description = 'Tracks the number of followers of a specific twitter user';

    public function convertValue($value)
    {
        return (int) preg_replace('/[^\d]+/', '', $value);
    }
}