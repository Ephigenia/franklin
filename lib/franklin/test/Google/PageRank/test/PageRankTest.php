<?php

namespace Franklin\test\Google\Results\test;

use
	Franklin\test\Google\PageRank\PageRank,
	Franklin\test\Google\PageRank\Config
	;

/**
 * @group Tests
 * @group Google
 */
class PageRankTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'host' => 'spiegel.de',
		));
		$this->fixture = new PageRank($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(2, $result);
	}
}