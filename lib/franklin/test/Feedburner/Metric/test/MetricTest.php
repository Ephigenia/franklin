<?php

namespace Franklin\test\Feedburner\Metric\test;

use
	Franklin\test\Feedburner\Metric\Metric,
	Franklin\test\Feedburner\Metric\Config,
	Franklin\test\Feedburner\Metric\Types
	;

/**
 * @group Tests
 * @group Feedburner
 */
class MetricTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'uri' => 'BurnThisRSS2',
		));
		$this->fixture = new Metric($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(5, $result);
	}
	
	public function testReaders()
	{
		$this->fixture->type = Types::READERS;
		$this->assertGreaterThan(5, $this->fixture->run());
	}
}