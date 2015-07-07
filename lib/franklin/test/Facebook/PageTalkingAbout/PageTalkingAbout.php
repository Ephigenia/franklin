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
		$response = $CURL->get('https://www.facebook.com/'.$this->config->id.'/likes');
		if ($response && preg_match('/\[\{"__m":"m_0_8"\},([\d\.]+)/i', $response, $matches)) {
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