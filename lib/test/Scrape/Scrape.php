<?php

namespace Franklin\test\Scrape;

use 
	Franklin\test\Test,
	Franklin\network\CURL
	;

class Scrape extends Test
{
	public function run()
	{
		$this->beforeRun();
		$curl = new CURL();
		$response = $curl->get($this->config->url);
		if (preg_match_all($this->config->regexp, $response, $found)) {
			if (isset($found['match'])) {
				$result = $found['match'][0];
			} else {
				$result = $found[1][0];
			}
			if (preg_match('@^-?\s?\d+$@', $result)) {
				$result = (float) $result;
			}
			return $result;
		}
		return false;
	}
}