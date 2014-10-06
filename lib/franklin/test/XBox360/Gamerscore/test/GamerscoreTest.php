<?php

namespace Franklin\test\XBox360\UserInfo\test;

use
	Franklin\test\XBox360\Gamerscore\Gamerscore,
	Franklin\test\XBox360\Gamerscore\Config
	;

/**
 * @group Tests
 * @group XBox360
 */
class GamerscoreTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'username' => 'ephBox',
		));
		$this->fixture = new Gamerscore($config);
	}

	public function testInvalidUsername()
	{
		$this->fixture->config->username = 'notfoundusernamehehe';
		$result = $this->fixture->run();
		$this->assertInternalType('boolean', $result);
		$this->assertFalse($result);
	}

	public function getUsernamesAndScores()
	{
		return array(
			array('ephBox', 11500),
			array('tjayars', 720000),
		);
	}
	
	/**
	 * @dataProvider getUsernamesAndScores
	 */
	public function testScore($username, $expectedMinimumScore)
	{
		$this->fixture->config->username = $username;
		$result = $this->fixture->run();
		$this->assertInternalType('integer', $result);
		$this->assertGreaterThan($expectedMinimumScore, $result, sprintf(
			'Expected %s to have at least a score of %s',
			$username,
			$expectedMinimumScore
		));
	}
}