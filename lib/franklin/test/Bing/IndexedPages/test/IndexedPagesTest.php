<?php

namespace Franklin\test\Bing\IndexedPages\test;

use
	Franklin\test\Bing\IndexedPages\IndexedPages,
	Franklin\test\Bing\IndexedPages\Config
	;

/**
 * @group Tests
 * @group Bing
 */
class IndexedPagesTest extends \PHPUnit_Framework_TestCase
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
		$this->assertInternalType('integer', $result);
		$this->assertGreaterThan(1000, $result);
	}
}