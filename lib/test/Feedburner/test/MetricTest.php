<?php

namespace Franklin\test\Feedburner\test;

use
	Franklin\test\Feedburner\Metric,
	Franklin\test\Feedburner\Config,
	Franklin\test\Feedburner\Types
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
			'username' => 'HorrorblogOrg',
		));
		$this->fixture = new Metric($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(0, $result);
	}
	
	public function testCirculation()
	{
		$this->fixture->type = Types::CIRCULATION;
		$this->assertGreaterThan(0, $result);
	}
}