<?php

namespace Franklin\test\Battlefield3\Score\test;

use
	Franklin\test\Battlefield3\Score\Score,
	Franklin\test\Battlefield3\Score\Config
	;

/**
 * @group Tests
 * @group Battlefield3
 */
class ScoreTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'platform' => '360',
			'username' => 'ephBox',
			'metric' => 'score',
		));
		$this->fixture = new Score($config);
	}
	
	public function testRunXBox360()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(10000, $result);
	}
	
	public function metrics()
	{
		return array(
			array('spm'),
			array('rounds'),
			array('wins'),
			array('losses'),
			array('skill'),
			array('kills'),
			array('deaths'),
			array('headshots'),
			array('accuracy'),
		);
	}
	
	/**
	 * @dataProvider metrics
	 */
	public function testOtherMetrics($metric)
	{
		$this->fixture->config->metric = $metric;
		$this->assertGreaterThan(5, $this->fixture->run());
	}
}