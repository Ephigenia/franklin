<?php

namespace Franklin\test\Vimeo\UserInfo\test;

use
	Franklin\test\XBox360\Gamerscore\Gamerscore,
	Franklin\test\XBox360\Gamerscore\Config
	;

/**
 * @group Tests
 * @group XBox360
 */
class GamerscoreTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'username' => 'ephBox',
		));
		$this->fixture = new Gamerscore($config);
	}
	
	public function testScore()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(8500, $result);
	}
}