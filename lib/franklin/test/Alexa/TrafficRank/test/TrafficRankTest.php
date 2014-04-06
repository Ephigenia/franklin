<?php

namespace Franklin\test\Alexa\TrafficRank\test;

use
	Franklin\test\Alexa\TrafficRank\TrafficRank,
	Franklin\test\Alexa\TrafficRank\Config
	;

/**
 * @group Tests
 * @group Alexa
 */
class TrafficRankTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'host' => 'spiegel.de',
		));
		$this->fixture = new TrafficRank($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertInternalType('float', $result);
		$this->assertGreaterThanOrEqual(50, $result);
	}
	
	public function testRunWithCountryCode()
	{
		$config = new Config(array(
			'host' => 'spiegel.de',
			'country_code' => 'de',
		));
		$this->fixture = new TrafficRank($config);
		$result = $this->fixture->run();
		$this->assertInternalType('float', $result);
		$this->assertLessThanOrEqual(20, $result);
	}
}