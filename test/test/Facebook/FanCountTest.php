<?php

use
	\Franklin\test\Facebook\FanCount,
	\Franklin\test\Facebook\Config
;

class FanCountTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$r = new \Franklin\test\Config();
		$this->fixture = new FanCount(new Config(array(
			'id' => '115046791864216',
		)));
	}
	
	public function testRun()
	{
		echo $this->fixture;
		var_dump($this->fixture);
	}
}