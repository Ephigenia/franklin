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
			'username' => 'ephigenia',
			'repository' => 'franklin',
			'key' => 'watchers',
		));
		$this->fixture = new RepoInfo($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(10, $result);
	}
	
	public function testSLOC()
	{
		$this->fixture->config->key = 'sloc';
		$result = $this->fixture->run();
		$this->assertGreaterThan(10000, $result);
	}
	
	public function testFollowing()
	{
		$this->fixture->config->key = 'forks';
		$result = $this->fixture->run();
		$this->assertGreaterThan(3, $result);
	}
}