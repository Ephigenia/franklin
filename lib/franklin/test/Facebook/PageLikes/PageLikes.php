<?php

namespace Franklin\test\Facebook\PageLikes;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

class PageLikes extends Test
{
	public $name = 'Facebook Fans';
	
	public $description = 'Track the number of people who liked a page on facebook.';
	
	public function run()
	{
		$this->beforeRun();
		$this->config->validate();
		$CURL = new CURL();
		$response = $CURL->get('http://graph.facebook.com/'.$this->config->id);
		if (($json = json_decode($response, true)) && isset($json['likes'])) {
			return $this->convertValue($json['likes']);
		}
		return false;
	}

	public function convertValue($value)
    {
        $value = (int) preg_replace('/[^\d]+/', '', $value);
        return $value;
    }
}