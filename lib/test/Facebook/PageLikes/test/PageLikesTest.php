<?php

namespace Franklin\test\Facebook\PakeLikes\test;

use
	Franklin\test\Facebook\PageLikes\PageLikes,
	Franklin\test\Facebook\PageLikes\Config
	;

/**
 * @group Tests
 * @group Facebook
 */
class PageLikesTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'id' => '115046791864216',
		));
		$this->fixture = new PageLikes($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertTrue(is_float($result));
	}
}