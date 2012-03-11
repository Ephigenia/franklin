<?php

namespace Franklin\test\Youtube\VideoInfo\test;

use
	Franklin\test\Youtube\VideoInfo\VideoInfo,
	Franklin\test\Youtube\VideoInfo\Config
	;

/**
 * @group Tests
 * @group Youtube
 */
class UserInfoTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'id' => '4eGQ5VFt7P4',
			'key' => 'likeCount',
		));
		$this->fixture = new VideoInfo($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(1, $result);
	}
	
	public function testRating()
	{
		$this->fixture->config->key = 'rating';
		$result = $this->fixture->run();
		$this->assertLessThan(5, $result);
		$this->assertGreaterThan(0, $result);
	}
}