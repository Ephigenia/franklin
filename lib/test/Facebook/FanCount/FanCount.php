<?php

namespace Franklin\test\Facebook\FanCount;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

class FanCount extends Test
{
	public $name = 'Facebook Fans Count';
	
	public $description = 'Counts the number of fans on something that can be reached over facebook’s graph api.';
	
	public function run()
	{
		$CURL = new CURL();
		$response = $CURL->get('http://graph.facebook.com/'.$this->config->id);
		if (($json = json_decode($response, true)) && isset($json['likes'])) {
			return (float) $json['likes'];
		}
		return false;
	}
}