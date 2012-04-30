<?php

namespace Franklin\test\PSNetwork\Trophies\test;

use
	Franklin\test\PSNetwork\Trophies\Trophies,
	Franklin\test\PSNetwork\Trophies\Config
	;

/**
 * @group Tests
 * @group PSNetwork
 */
class TrophiesTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'username' => 'ohiostatedog',
		));
		$this->fixture = new Trophies($config);
	}
	
	public function testTotalTrophiesCount()
	{
		$this->fixture->config->key = 'total';
		$result = $this->fixture->run();
		$this->assertGreaterThan(550, $result);
	}
	
	public function testTrophyTypeCounts()
	{
		$typeAndCounts = array(
			'platinum' => 0,
			'gold' => 7,
			'silver' => 80,
			'bronze' => 460,
		);
		foreach($typeAndCounts as $type => $minCount) {
			$this->fixture->config->key = $type;
			$result = $this->fixture->run();
			$this->assertGreaterThan($minCount, $result);
		}
	}
	
	public function testLevel()
	{
		$this->fixture->config->username = 'ohiostatedog';
		$this->fixture->config->key = 'level';
		$result = $this->fixture->run();
		$this->assertGreaterThan(8, $result);
	}
}