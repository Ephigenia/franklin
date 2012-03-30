<?php

namespace Franklin\test\Bing\Results\test;

use
	Franklin\test\Google\Results\Results,
	Franklin\test\Google\Results\Config
	;

/**
 * @group Tests
 * @group Bing
 */
class ResultsTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'q' => 'Franklin',
		));
		$this->fixture = new Results($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(100000, $result);
	}
}