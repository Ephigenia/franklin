<?php

namespace Franklin\test\GitHub\UserInfo;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

class UserInfo extends Test
{
	public $name = 'GitHub user information';
	
	public $description = 'Information about a github user';
	
	public function run()
	{
		$url = 'https://api.github.com/users/'.$this->config->username;
		$CURL = new CURL();
		$result = $CURL->get($url);
		if ($result && $data = json_decode($result, true)) {
			return (int) $data[$this->config->key];
		}
		return 0;
	}
}