<?php

namespace Franklin\test\Scrape;

use
	Franklin\test\config\type\String,
	Franklin\test\config\type\URL
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new URL('url', true, null, 'URL of the website that’s result should be scraped'),
			new String('regexp', true, null, 'Valid regexp expression that should be used to get the result')
		);
		return true;
	}
}