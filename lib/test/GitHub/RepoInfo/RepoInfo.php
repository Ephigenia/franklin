<?php

namespace Franklin\test\GitHub\RepoInfo;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

class RepoInfo extends Test
{
	public $name = 'GitHub repository information';
	
	public $description = 'Information about a repository';
	
	public function run()
	{
		$endpoint = 'https://api.github.com/repos/';
		$url = $endpoint.$this->config->username.'/'.$this->config->repository;
		if (strncasecmp($this->config->key, 'sloc', 4)) {
			$url .= '/languages';
		}
		$CURL = new CURL();
		$result = $CURL->get($url);
		if ($result && $data = json_decode($result, true)) {
			if (strncasecmp($this->config->key, 'sloc', 4)) {
				return array_sum($data);
			} else {
				return (int) $data[$this->config->key];
			}
		}
		return 0;
	}
}