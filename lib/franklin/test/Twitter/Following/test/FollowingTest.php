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

	public function usernames()
	{
		return array(
			array('ephigenia', 2),
			array('berlinergazette', 50),
			array('bzberlin', 300)
		);
	}

	/**
	 * @dataProvider usernames
	 */
	public function testRun($username, $expectedCount = 10)
	{
		$this->fixture->config['username'] = $username;
		$result = $this->fixture->run();
		$this->assertInternalType('integer', $result, 'Expected Result to be a integer value');
		$this->assertGreaterThanOrEqual($expectedCount, $result, sprintf(
			"expected twitter user %s to have at follow at least %d", $username, $expectedCount
		));
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
		$this->assertInternalType('integer', $result);
		$this->assertGreaterThanOrEqual(3000, $result, 'Expected cosmar to follow more than 3000ppl.');
	}
}