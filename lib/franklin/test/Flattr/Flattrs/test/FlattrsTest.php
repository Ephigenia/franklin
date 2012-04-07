<?php

namespace Franklin\test\Feedburner\Metric\test;

use
	Franklin\test\Flattr\Flattrs\Flattrs,
	Franklin\test\Flattr\Flattrs\Config
	;

/**
 * @group Tests
 * @group Flattr
 */
class FlattrsTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config();
		$this->fixture = new Flattrs($config);
	}
	
	public function testRunWithURL()
	{
		$this->fixture->config->url = 'http://berlinergazette.de/sonnenfinsternis-in-fulda/';
		$result = $this->fixture->run();
		$this->assertGreaterThan(3, $result);
	}
		
	public function testRunWithThing()
	{
		$this->fixture->config->thing = 470312;
		$result = $this->fixture->run();
		$this->assertGreaterThan(1, $result);
	}
	
	public function testRunWithUsername()
	{
		$this->fixture->config->username = 'BerlinerGazette';
		$result = $this->fixture->run();
		$this->assertGreaterThan(90, $result);
	}
}