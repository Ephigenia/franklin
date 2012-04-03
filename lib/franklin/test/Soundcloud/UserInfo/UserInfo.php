<?php

namespace Franklin\test\Soundcloud\UserInfo;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

class UserInfo extends Test
{
	public $name = 'Soundcloud user information';
	
	public $description = 'record information about a soundcloud user';
	
	public function run()
	{
		$url = 'http://api.soundcloud.com/users/'.$this->config->username.'.json';
		$CURL = new CURL();
		$result = $CURL->get($url, array('consumer_key' => 'aecdbad067b1f60f765db9a16af53cc4'));
		if ($result) {
			$json = json_decode($result, true);
			if (isset($json[$this->config->key.'_count'])) {
				return (int) $json[$this->config->key.'_count'];
			}
		}
		return 0;
	}
}