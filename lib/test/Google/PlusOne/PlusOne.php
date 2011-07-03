<?php

namespace Franklin\test\Google\PlusOne;

use
	Franklin\test\Scrape\Scrape,
	Franklin\network\CURL
	;

/**
 * http://code.google.com/intl/de-AT/apis/+1button/
 * http://openminds.lucido-media.de/php-google-plus-one-count-api
 */
class PlusOne extends Scrape
{
	public $name = 'Google PlusOne Share Counts';
	
	public $description = 'Number of Google PlusOne shares on a single URL';
	
	public function run()
	{
		$CURL = new CURL(array(
			CURLOPT_HTTPHEADER => array(
				'Content-type: application/json'
			),
			CURLOPT_RETURNTRANSFER => 3,
			CURLOPT_SSL_VERIFYPEER => false,
		));
		$result = $CURL->post('https://clients6.google.com/rpc', '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"'.$this->config->url.'","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
		if ($result) {
			$json = json_decode($result, true);
			return intval($json[0]['result']['metadata']['globalCounts']['count']);
		}
		return 0;
	}
}