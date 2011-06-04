<?php

namespace Franklin\test\Google\Results\test;

use
	Franklin\test\Google\Results\Results,
	Franklin\test\Google\Results\Config
	;

/**
 * @group Tests
 * @group Google
 */
class FollowingTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'q' => 'Franklin',
		));
		$this->fixture = new Results($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertTrue($result > 1000);
	}
}