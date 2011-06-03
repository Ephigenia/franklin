<?php

namespace Franklin\test\Facebook\FanCount;

use
	Franklin\network\CURL
	;

class FanCount extends \Franklin\test\Scrape\Scrape
{
	public $name = 'Facebook Fans Count';
	
	public function run()
	{
		$CURL = new CURL();
		$response = $CURL->get($this->config->url);
		if (($json = json_decode($response, true)) && isset($json['likes'])) {
			return (float) $json['likes'];
		}
		return false;
	}
}