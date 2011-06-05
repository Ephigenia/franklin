<?php

namespace Franklin\test\Compete\Rank;

use 
	Franklin\test\Test,
	Franklin\network\CURL
	;

class Rank extends Test
{
	public $name = 'Compete Rank';
	
	public $description = 'Rank on compete.com of a website';
	
	public function run()
	{
		$this->beforeRun();
		$CURL = new CURL();
		$url = 'http://apps.compete.com/sites/'.$this->config->host.'/trended/'.$this->config->metric.'/?apikey='.$this->config->api_key;
		$response = $CURL->get($url);
		if (($json = json_decode($response, true)) && $json['status'] == 'OK') {
			$lastMonth = array_pop($json['data']['trends'][$this->config->metric]);
			return (float) $lastMonth['value'];
		}
		return false;
	}
}