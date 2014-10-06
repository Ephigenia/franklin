<?php

namespace Franklin\test\XBox360\UserInfo\test;

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

	public function testInvalidUsername()
	{
		$this->fixture->username = 'notfoundusernamehehe';
		$result = $this->fixture->run();
		$this->assertInternalType('boolean', $result);
		$this->assertFalse($result);
	}
	
	public function testScore()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(8500, $result);
	}
}