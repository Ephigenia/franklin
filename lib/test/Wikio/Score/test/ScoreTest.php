<?php

namespace Franklin\test\Wikio\Score\test;

use
	Franklin\test\Wikio\Score\Score,
	Franklin\test\Wikio\Score\Config
	;

/**
 * @group Tests
 * @group Wikio
 */
class ScoreTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'id' => 'www.horrorblog.org-aeK1',
		));
		$this->fixture = new Score($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(1, $result);
	}
}