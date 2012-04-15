<?php

namespace Franklin\test\XBox360\Gamerscore;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

class Gamerscore extends Test
{
	public $name = 'XBox 360 Gamercore';
	
	public $description = 'Gamerscore of a xbox user (aka Gamerscore)';
	
	public function run()
	{
		$url = 'https://live.xbox.com/de-DE/Profile';
		// scrape url and extract gamerscore from the DOM
		$data = array('gamertag' => $this->config->username);
		$curl = new CURL(array(
			// ms servers are really slow so give them a chance 
			// with higher timeout
			CURLOPT_TIMEOUT => 20, 
		));
		$source = $curl->get($url, $data);
		if (!$source) {
			return 0;
		}
		// parse source and extract score
		$DOMDocument = new \DOMDocument();
		@$DOMDocument->loadHTML($source);
		$DOMXPath = new \DOMXPath($DOMDocument);
		$nodes = $DOMXPath->query('//div[@class="gamerscore"]');
		if ($nodes->length > 0) {
			foreach($nodes as $node) {
				return (int) $node->textContent;
			}
		}
		return 0;
	}
}