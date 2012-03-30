<?php

namespace Franklin\test\GitHub\UserInfo\test;

use
	Franklin\test\GitHub\UserInfo\UserInfo,
	Franklin\test\GitHub\UserInfo\Config
	;

/**
 * @group Tests
 * @group GitHub
 */
class UserInfoTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'username' => 'ephigenia',
			'key' => 'followers',
		));
		$this->fixture = new UserInfo($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(10, $result);
	}
	
	public function testFollowing()
	{
		$this->fixture->config->key = 'following';
		$result = $this->fixture->run();
		$this->assertGreaterThan(20, $result);
	}
}