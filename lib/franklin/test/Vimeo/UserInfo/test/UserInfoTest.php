<?php

namespace Franklin\test\Vimeo\UserInfo\test;

use
	Franklin\test\Vimeo\UserInfo\UserInfo,
	Franklin\test\Vimeo\UserInfo\Config
	;

/**
 * @group Tests
 * @group Vimeo
 */
class UserInfoTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'username' => 'ephigenia',
			'key' => 'videos_uploaded',
		));
		$this->fixture = new UserInfo($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(1, $result);
	}
}