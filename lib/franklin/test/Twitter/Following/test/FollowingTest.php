<?php

namespace Franklin\test\Twitter\Following\test;

use
	Franklin\test\Twitter\Following\Following,
	Franklin\test\Twitter\Following\Config
	;

/**
 * @group Tests
 * @group Twitter
 */
class FollowingTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'username' => 'ephigenia',
		));
		$this->fixture = new Following($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertInternalType('float', $result);
		$this->assertGreaterThanOrEqual(2, $result);
	}

	public function testUserNotFound()
	{
		$this->fixture->config['username'] = 'notfoundusername';
		$result = $this->fixture->run();
		$this->assertFalse($result);
	}

	public function testUserWithManyFollowing()
	{
		$this->fixture->config['username'] = 'kosmar';
		$result = $this->fixture->run();
		$this->assertInternalType('float', $result);
		$this->assertGreaterThanOrEqual(3000, $result, 'Expected cosmar to follow more than 3000ppl.');
	}
}