<?php

use
	\Franklin\test\Facebook\FanCount,
	\Franklin\test\Facebook\Config
;

class FanCountTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'id' => '115046791864216',
		));
		$this->fixture = new FanCount($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertTrue(is_float($result));
		$this->assertTrue($result > 0);
	}
}