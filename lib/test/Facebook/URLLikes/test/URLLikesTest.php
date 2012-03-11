<?php

namespace Franklin\Test\test\Facebook\PakeLikes\test;

use
	\Franklin\test\Facebook\URLLikes\URLLikes,
	\Franklin\test\Facebook\URLLikes\Config,
	\Franklin\test\Facebook\URLLikes\Types
	;

/**
 * @group Tests
 * @group Facebook
 */
class URLLikesTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'url' => 'http://www.spiegel.de',
			'type' => Types::TOTAL,
		));
		$this->fixture = new URLLikes($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertTrue(is_float($result));
		$this->assertTrue($result > 0);
	}
}