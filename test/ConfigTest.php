<?php

use \Franklin\Config;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->fixture = new Config();
	}

	public function testOffsetGet()
	{
		$this->assertEquals($this->fixture->timezone, 'Europe/Berlin');
		$this->assertEquals($this->fixture['timezone'], 'Europe/Berlin');
	}
	
	public function test__construct()
	{
		$config = new Config(array('timezone' => 'USA/Chicago'));
		$this->assertEquals($config->timezone, 'USA/Chicago');
	}
}