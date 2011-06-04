<?php

namespace Franklin\Test\test\Facebook;

use
	\Franklin\test\Facebook\FanCount\FanCount,
	\Franklin\test\Facebook\FanCount\FanCountConfig
;

class FanCountTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new FanCountConfig(array(
			'id' => '115046791864216',
		));
		die(var_dump($config));
		$this->fixture = new FanCount($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertTrue(is_float($result));
		$this->assertTrue($result > 0);
	}
}