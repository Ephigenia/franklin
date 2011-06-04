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
		$this->assertTrue($result > 0);
	}
}