<?php

namespace Franklin\test\Lesercharts\Position\test;

use
	Franklin\test\Lesercharts\Position\Position,
	Franklin\test\Lesercharts\Position\Config
	;

/**
 * @group Tests
 * @group Lesercharts.de
 */
class PositionTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'name' => 'Horrorblog.org',
		));
		$this->fixture = new Position($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertTrue($result > 0);
	}
}