<?php

namespace Franklin\test\Google\BackLinks\test;

use
	Franklin\test\Google\BackLinks\Backlinks,
	Franklin\test\Google\BackLinks\Config
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