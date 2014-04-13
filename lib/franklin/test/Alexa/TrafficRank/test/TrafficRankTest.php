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

	public function testHostNotFound() 
	{
		$this->fixture->config->host = 'asldkjasdlk';
		$result = $this->fixture->run();
		$this->assertInternalType('boolean', $result);
		$this->assertFalse($result);
	}
	
	public function hosts()
	{
		return array(
			array('facebook.com', 1),
			array('spiegel.de', 25),
			array('fuenf-filmfreunde.de', 100000),
		);
	}

	/**
	 * @dataProvider hosts
	 */
	public function testRun($host, $minimumRank = 1)
	{
		$this->fixture->config->host = $host;
		$result = $this->fixture->run();
		$this->assertInternalType('integer', $result);
		$this->assertGreaterThanOrEqual($minimumRank, $result, sprintf(
			"Expected %s to be at least on rank %d",
			$host,
			$minimumRank
		));
	}
}