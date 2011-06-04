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
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertTrue($result > 0);
	}
}