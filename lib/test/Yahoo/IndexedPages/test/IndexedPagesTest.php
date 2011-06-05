<?php

namespace Franklin\test\Yahoo\IndexedPages\test;

use
	Franklin\test\Yahoo\IndexedPages\IndexedPages,
	Franklin\test\Yahoo\IndexedPages\Config
	;

/**
 * @group Tests
 * @group Yahoo
 */
class IndexedPagesTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'host' => 'horrorblog.org',
		));
		$this->fixture = new IndexedPages($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(1000, $result);
	}
}