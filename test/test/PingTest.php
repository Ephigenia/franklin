<?php

class PingTest extends PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		class_exists('Test') or require FRANKLIN_ROOT.'/lib/test/PingTest.php';
		$this->fixture = new Test(array(
			'host' => 'localhost',
			'timeout' => 100,
		));
	}
	
	public function testRun()
	{
		var_dump($this->fixture->run());
	}
}