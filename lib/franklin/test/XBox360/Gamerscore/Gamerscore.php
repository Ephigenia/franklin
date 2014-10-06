<?php

namespace Franklin\test\XBox360\Gamerscore;

use
	Franklin\test\Scrape\Scrape,
	Franklin\network\CURL
	;

class Gamerscore extends Scrape
{
	public $name = 'XBox 360 Gamercore';
	
	public $description = 'Gamerscore of a xbox user (aka Gamerscore)';

	public function run()
	{
		$this->beforeRun();

		$url = sprintf('http://www.xboxgamertag.com/search/%s/', $this->config->username);
		$CURL = new CURL();
		$response = $CURL->get($url);
		if ($result = $this->processResponse($response)) {
			$result = $this->convertValue($result);
		}

		return $result;
	}
	
	public function processResponse($response)
	{
		if (!$response) {
			return false;
		}
		
		// parse source and extract score
		$DOMDocument = new \DOMDocument();
		@$DOMDocument->loadHTML($response);
		$DOMXPath = new \DOMXPath($DOMDocument);
		$nodes = $DOMXPath->query('//p[@class="rightGS"]');

		if ($nodes->length > 0) {
			foreach($nodes as $node) {
				return trim($node->textContent);
			}
		}

		return false;
	}

	public function convertValue($string)
	{
		return (int) preg_replace('/[^\d]+/', '', $string);
	}
}