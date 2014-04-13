<?php

namespace Franklin\test\GitHub\RepoInfo;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

class RepoInfo extends Test
{
	public $name = 'GitHub Repository';
	
	public $description = 'Information about a repository';
	
	public function run()
	{
		$this->beforeRun();
		$endpoint = 'https://api.github.com/repos/';
		$url = $endpoint.$this->config->username.'/'.$this->config->repository;
		if (strtolower($this->config->key) == 'sloc') {
			$url .= '/languages';
		}
		$CURL = new CURL();
		$result = $CURL->get($url);

		if (!$result) {
			return false;
		}
		if (!($data = json_decode($result, true))) {
			return false;
		}
		if (isset($data['message'])) {
			switch ($data['message']) {
				case 'Not Found':
					return false;
					break;
				default:
					break;
			}
		}
		if (strnatcasecmp($this->config->key, 'sloc') === 0) {
			return array_sum($data);
		} else {
			return (int) $data[$this->config->key];
		}
		return 0;
	}
}