<?php

namespace Franklin\test\Facebook\PageTalkingAbout;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

class PageTalkingAbout extends Test
{
	public $name = 'Facebook Talking About';
	
	public $description = 'Track the number of people talking about a facebook page';
	
	public function run()
	{
		$this->beforeRun();
		$this->config->validate();
		$CURL = new CURL();
		$response = $CURL->get('http://graph.facebook.com/'.$this->config->id);
		if (($json = json_decode($response, true)) && isset($json['likes'])) {
			return (float) $json['talking_about_count'];
		}
		return false;
	}
}