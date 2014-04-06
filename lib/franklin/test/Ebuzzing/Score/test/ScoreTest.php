<?php

namespace Franklin\test\Ebuzzing\Score\test;

use
	Franklin\test\Ebuzzing\Score\Score,
	Franklin\test\Ebuzzing\Score\Config
	;

/**
 * @group Tests
 * @group Ebuzzing
 */
class ScoreTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'id' => 'netzpolitik.org-7HE9',
		));
		$this->fixture = new Score($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(5, $result);
	}
}