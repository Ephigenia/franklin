<?php

namespace Franklin\test\Scrape;

use
	Franklin\test\config\type\String,
	Franklin\test\config\type\Integer,
	Franklin\test\config\type\URL
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new URL('url', true, null, 'URL of the website that’s result should be scraped'),
			new String('regexp', true, null, 'Valid regexp expression that should be used to get the result'),
			new Integer('timeout', false, 5, 'timeout till scraper stops requesting the website'),
			new Integer('port', false, 80, 'port on which the request should be send'),
			new String('referer', false, false, 'optional referer to send when requesting'),
			new String('user-agent', false, false, 'optional user agent string to send when requesting')
		);
		return true;
	}
}