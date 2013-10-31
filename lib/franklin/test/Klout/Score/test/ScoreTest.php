<?php

namespace Franklin\test\Klout\Score\test;

use
	Franklin\test\Klout\Score\Score,
	Franklin\test\Klout\Score\Config
	;

/**
 * @group Tests
 * @group Klout
 */
class ScoreTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'username' => 'ibm',
		));
		$this->fixture = new Score($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertInternalType('float', $result, 'Expected Result to be a float value');
		$this->assertGreaterThanOrEqual(10, $result, 'Expected Result to be above 10');
	}
}