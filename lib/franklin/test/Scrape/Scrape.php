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

		if ($result = $this->processResponse($response)) {
			$result = $this->convertValue($result);
		}
		return $result;
	}

	public function processResponse($response)
	{
		if (preg_match_all($this->config->regexp, $response, $found)) {
			if (isset($found['match'])) {
				$result = $found['match'][0];
			} else {
				$result = $found[1][0];
			}
			return $result;
		}
		return false;
	}

	public function convertValue($value)
	{
		if (preg_match('@^-?\s?[\d\s,.-]+$@', $value)) {
			$value = str_replace('.', '', $value);
			$value = (float) $value;
		}
		return $value;
	}
}