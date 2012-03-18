<?php

namespace Franklin\test\Google\PlusOne;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

/**
 * http://code.google.com/intl/de-AT/apis/+1button/
 * http://openminds.lucido-media.de/php-google-plus-one-count-api
 */
class PlusOne extends Test
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
		$postData = '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"'.$this->config->url.'","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]';
		$result = $CURL->post('https://clients6.google.com/rpc', $postData);
		if ($result && $data = json_decode($result, true)) {
			return (int) $data[0]['result']['metadata']['globalCounts']['count'];
		}
		return 0;
	}
}