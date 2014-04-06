<?php

namespace Franklin\test\Google\Backlinks\test;

use
	Franklin\test\Google\Backlinks\Backlinks,
	Franklin\test\Google\Backlinks\Config
	;

/**
 * @group Tests
 * @group Google
 */
class BacklinksTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'host' => 'www.spiegel.de',
		));
		$this->fixture = new Backlinks($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertTrue($result > 10);
	}
}