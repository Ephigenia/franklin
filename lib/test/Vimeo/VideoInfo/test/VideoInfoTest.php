<?php

namespace Franklin\test\Vimeo\VideoInfo\test;

use
	Franklin\test\Vimeo\VideoInfo\VideoInfo,
	Franklin\test\Vimeo\VideoInfo\Config
	;

/**
 * @group Tests
 * @group Vimeo
 */
class UserInfoTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'id' => 33412834,
			'key' => 'plays',
		));
		$this->fixture = new VideoInfo($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(1, $result);
	}
}