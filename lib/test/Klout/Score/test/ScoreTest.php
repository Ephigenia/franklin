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
			'username' => 'horrorblogorg',
		));
		$this->fixture = new Score($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertTrue($result > 0);
	}
}