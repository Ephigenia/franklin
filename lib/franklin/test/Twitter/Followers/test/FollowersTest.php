<?php

namespace Franklin\test\Twitter\Followers\test;

use
	Franklin\test\Twitter\Followers\Followers,
	Franklin\test\Twitter\Followers\Config
	;

/**
 * @group Tests
 * @group Twitter
 */
class FollowersTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'username' => 'ephigenia',
		));
		$this->fixture = new Followers($config);
	}
	
	public function usernames()
	{
		return array(
			array('ephigenia'),
			array('berlinergazette'),
			array('bzberlin'),
			array('CDU'),
		);
	}

	/**
	 * @dataProvider usernames
	 */
	public function testRun($username, $expectedCount = 100)
	{
		$this->fixture->config['username'] = $username;
		$result = $this->fixture->run();
		$this->assertInternalType('integer', $result, 'Expected Result to be a integer value');
		$this->assertGreaterThanOrEqual($expectedCount, $result, sprintf(
			"expected twitter user %s to have at least %d followers", $username, $expectedCount
		));
	}

	public function testUserNotFound()
	{
		$this->fixture->config['username'] = 'notfoundusername';
		$result = $this->fixture->run();
		$this->assertFalse($result);
	}

	public function testUserWithManyFollowers()
	{
		$this->fixture->config['username'] = 'instagram';
		$result = $this->fixture->run();
		$this->assertInternalType('integer', $result, 'Expected Result to be a integer value');
		$this->assertGreaterThanOrEqual(3100000, $result, 'Expected Result to be above 3.1mio');	
	}
}