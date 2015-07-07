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
		
		$url = 'https://www.facebook.com/'.$this->config->id;
		$response = $CURL->get($url);
		if ($response && preg_match('/PagesLikesCountDOMID">.+>([\d\.]+)/i', $response, $matches)) {
			return $this->convertValue($matches[1]);
		}
		return false;
	}

	public function convertValue($value)
	{
		$integer = (int) preg_replace('/[^\d]+/', '', $value);
		return $integer;
	}
}