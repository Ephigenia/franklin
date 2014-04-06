<?php

namespace Franklin\test\Soundcloud\TrackInfo\test;

use
	Franklin\test\Soundcloud\TrackInfo\TrackInfo,
	Franklin\test\Soundcloud\TrackInfo\Config
	;

/**
 * @group Tests
 * @group Soundcloud
 */
class TrackInfoTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'id' => 291,
			'key' => 'playback',
		));
		$this->fixture = new TrackInfo($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(100, $result);
	}
}