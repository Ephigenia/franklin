<?php

namespace Franklin\test\Facebook\PakeLikes\test;

use
	Franklin\test\Scrape\Scrape,
	Franklin\test\Scrape\Config
	;

/**
 * @group Tests
 * @group Scrape
 */
class ScrapeTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'url' => 'http://www.spiegel.de',
			'regexp' => '@<title>([^<]+)</title>@i',
		));
		$this->fixture = new Scrape($config);
	}
	
	public function testRun()
	{
		$this->assertEquals($this->fixture->run(), 'SPIEGEL ONLINE - Nachrichten');
	}
	
	public function testRunMatch()
	{
		$this->fixture->config->regexp = '@<(title)>(?P<match>[^<]+)</title>@i';
		$this->assertEquals($this->fixture->run(), 'SPIEGEL ONLINE - Nachrichten');
	}
}