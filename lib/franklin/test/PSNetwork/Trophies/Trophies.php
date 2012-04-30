<?php

namespace Franklin\test\PSNetwork\Trophies;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

class Trophies extends Test
{
	public $name = 'PSNetwork Trophies';
	
	public $description = 'Playstation network user trophies';
	
	public function run()
	{
		// scrape url and extract gamerscore from the DOM
		$curl = new CURL(array(
			CURLOPT_REFERER => 'http://us.playstation.com/publictrophy/index.htm',
		));
		$source = $curl->get('http://us.playstation.com/playstation/psn/profiles/'.$this->config->username);
		if (!$source) {
			return 0;
		}
		// parse source and extract score
		switch(strtolower($this->config->key)) {
			default:
				return 0;
				break;
			case 'total':
				$regexp = '/<div id="totaltrophies">.*<div id="text">([\s\d]+)/is';
				break;
			case 'platinum':
				$regexp = '/<div class="text platinum">(\d+)/i';
				break;
			case 'gold':
				$regexp = '/<div class="text gold">(\d+)/i';
				break;
			case 'silver':
				$regexp = '/<div class="text silver">(\d+)/i';
				break;
			case 'bronze':
				$regexp = '/<div class="text bronze">(\d+)/i';
				break;
			case 'level':
				$regexp = '/<div id="leveltext">\s*(\d+)/i';
				break;
		}
		if (preg_match($regexp, $source, $found)) {
			return (int) trim($found[1]);
		}
		return 0;
	}
}