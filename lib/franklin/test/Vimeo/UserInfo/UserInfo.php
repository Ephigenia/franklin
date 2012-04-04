<?php

namespace Franklin\test\Vimeo\UserInfo;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

class UserInfo extends Test
{
	public $name = 'Vimeo User Information';
	
	public $description = 'Information about a user';
	
	public function run()
	{
		$this->beforeRun();
		$url = 'http://vimeo.com/api/v2/'.$this->config->username.'/info.json';
		$CURL = new CURL();
		$result = $CURL->get($url);
		if ($result) {
			$json = json_decode($result, true);
			if (isset($json['total_'.$this->config->key])) {
				return $json['total_'.$this->config->key];
			}
		}
		return 0;
	}
}