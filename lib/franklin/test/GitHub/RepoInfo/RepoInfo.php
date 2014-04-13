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

		// something in the response went wrong
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

		// sloc count sums up the json response
		if ($this->config->key == 'sloc') {
			return array_sum($data);
		}

		// other keys may need mapping
		$keypmapping = array(
			'stargazers' => 'stargazers_count',
			'watchers' => 'watchers_count',
			'forks' => 'forks_count',
			'open_issues' => 'open_issues',
			'size' => 'size',
		);
		if (!isset($keypmapping[$this->config->key])) {
			return false;
		}
		$mappedKey = $keypmapping[$this->config->key];
		return (int) $data[$mappedKey];
	}
}