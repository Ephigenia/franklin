<?php

namespace Franklin\test\Facebook\ApplicationActivity;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

class ApplicationActivity extends Test
{
	public $name = 'Facebook Application Activity';
	
	public $description = 'Track public insight data of a application on facebook.';
	
	public function run()
	{
		$this->beforeRun();
		$this->config->validate();
		$CURL = new CURL();
		$response = $CURL->get('http://graph.facebook.com/'.$this->config->id);
		if ($json = json_decode($response, true)) {
			return (int) $json[$this->config->key.'_active_users'];
		}
		return false;
	}
}