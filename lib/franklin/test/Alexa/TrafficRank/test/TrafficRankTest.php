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
		$this->assertTrue($result > 10);
	}
	
	public function testRunWithCountryCode()
	{
		$this->fixture->country_code = 'DE';
		$result = $this->fixture->run();
		$this->assertTrue($result > 10);
	}
}