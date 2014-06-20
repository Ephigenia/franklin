<?php

namespace Franklin\test\Facebook\PageTalkingAbout\test;

use
	Franklin\test\Facebook\PageTalkingAbout\PageTalkingAbout,
	Franklin\test\Facebook\PageTalkingAbout\Config
	;

/**
 * @group Tests
 * @group Facebook
 */
class PageTalkingAboutTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'id' => '115046791864216',
		));
		$this->fixture = new PageTalkingAbout($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(3, $result);
	}
}