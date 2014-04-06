<?php

namespace Franklin\test\Compete\Rank\test;

use
	Franklin\test\Compete\Rank\Rank,
	Franklin\test\Compete\Rank\Config,
	Franklin\test\Compete\Rank\Metrics
	;

/**
 * @group Tests
 * @group Compete
 */
class TrafficRankTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'api_key' => '5d84afee288906a06e3af66b83609dc4',
			'host' => 'spiegel.de',
			'metric' => Metrics::RANK,
		));
		$this->fixture = new Rank($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertTrue($result > 1000);
	}
}