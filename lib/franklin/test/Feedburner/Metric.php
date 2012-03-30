<?php

namespace Franklin\test\Feedburner;

use
	Franklin\test\Scrape\Scrape
	;

class Metric extends Scrape
{
	public $name = 'Feedburner API';
	
	public $description = 'Tracks the number of readers and hits on a feedburner stream';
}