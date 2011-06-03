<?php

namespace Franklin\test\Scrape;

use
	Franklin\network\CURL,
	Franklin\test\AbstractTest
	;

class Scrape extends AbstractTest
{
	public function run()
	{
		$curl = new CURL();
		$response = $curl->get($this->config->url);
		if (preg_match_all($this->config->regexp, $response, $found)) {
			if ($found['match']) {
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