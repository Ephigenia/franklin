<?php

namespace Franklin\test\Soundcloud\UserInfo\test;

use
	Franklin\test\Soundcloud\UserInfo\UserInfo,
	Franklin\test\Soundcloud\UserInfo\Config
	;

/**
 * @group Tests
 * @group Soundcloud
 */
class UserInfoTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'username' => 'killthenoise',
			'key' => 'track',
		));
		$this->fixture = new UserInfo($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(2, $result);
	}
	
	public function testPlaylist()
	{
		$this->fixture->config->key = 'playlist';
		$this->assertGreaterThan(1, $this->fixture->run());
	}
	
	public function testFollowers()
	{
		$this->fixture->config->key = 'followers';
		$this->assertGreaterThan(50, $this->fixture->run());
	}
	
	public function testFollowings()
	{
		$this->fixture->config->key = 'followings';
		$this->assertGreaterThan(3, $this->fixture->run());
	}
	
	public function testPublicFavorites()
	{
		$this->fixture->config->key = 'public_favorites';
		$this->assertGreaterThan(3, $this->fixture->run());
	}
}