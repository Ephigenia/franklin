<?php

namespace Franklin\test\Google\IndexedPages\test;

use
	Franklin\test\Google\IndexedPages\IndexedPages,
	Franklin\test\Google\IndexedPages\Config
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
			'host' => 'www.spiegel.de',
		));
		$this->fixture = new IndexedPages($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertTrue($result > 1000);
	}
}