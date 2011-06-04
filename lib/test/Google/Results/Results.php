<?php

namespace Franklin\test\Google\Results;

use
	Franklin\test\Scrape\Scrape
	;

class Results extends Scrape
{
	public $name = 'Results for Query on Google';
	
	public $description = 'Tracks the number of results found via Google Search API for a specific query';
}