<?php

namespace Franklin\test\GitHub\UserInfo;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

class UserInfo extends Test
{
	public $name = 'GitHub User-Info';
	
	public $description = 'Information about a github user';
	
	public function run()
	{
		$url = 'https://github.com/api/v2/json/user/show/'.$this->config->username;
		$CURL = new CURL();
		$result = $CURL->get($url);
		if ($result && $data = json_decode($result, true)) {
			return (int) $data['user'][$this->config->key.'_count'];
		}
		return 0;
	}
}