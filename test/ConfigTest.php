<?php

class Franklin_ConfigTest extends PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->fixture = new Franklin_Config();
	}
	
	public function testOffsetGet()
	{
		$this->assertEquals($this->fixture->timezone, 'Europe/Berlin');
		$this->assertEquals($this->fixture['timezone'], 'Europe/Berlin');
	}
	
	public function test__construct()
	{
		$config = new Franklin_Config(array('timezone' => 'USA/Chicago'));
		$this->assertEquals($config->timezone, 'USA/Chicago');
	}
}