<?php

namespace Franklin\test\Google\Results;

use
	Franklin\test\Scrape\Scrape
	;

class Results extends Scrape
{
	public $name = 'Google Search Results';
	
	public $description = 'Tracks the number of results found via Google Search API for a specific query';
}