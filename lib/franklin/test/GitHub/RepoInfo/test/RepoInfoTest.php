<?php

namespace Franklin\test\GitHub\RepoInfo\test;

use
	Franklin\test\GitHub\RepoInfo\RepoInfo,
	Franklin\test\GitHub\RepoInfo\Config
	;

/**
 * @group Tests
 * @group GitHub
 */
class RepoInfoTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'username' => 'symfony',
			'repository' => 'symfony-standard',
		));
		$this->fixture = new RepoInfo($config);
	}

	public function testRepoNotFound()
	{
		$this->fixture->config->username = 'something';
		$this->fixture->config->repository = 'which_cannot_be_found';
		$result = $this->fixture->run();
		$this->assertInternalType('boolean', $result);
		$this->assertFalse($result);
	}

	public function testStargazers()
	{
		$this->fixture->config->key = 'stargazers';
		$result = $this->fixture->run();
		$this->assertGreaterThan(900, $result);
	}

	public function testWatchers()
	{
		$this->fixture->config->key = 'watchers';
		$result = $this->fixture->run();
		$this->assertGreaterThan(900, $result);
	}
	
	public function testSLOC()
	{
		$this->fixture->config->key = 'sloc';
		$result = $this->fixture->run();
		$this->assertGreaterThan(10000, $result);
	}
	
	public function testForks()
	{
		$this->fixture->config->key = 'forks';
		$result = $this->fixture->run();
		$this->assertGreaterThan(3, $result);
	}
}