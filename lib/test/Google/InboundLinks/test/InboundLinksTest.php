<?php

namespace Franklin\test\Google\InboundLinks\test;

use
	Franklin\test\Google\InboundLinks\InboundLinks,
	Franklin\test\Google\InboundLinks\Config
	;

/**
 * @group Tests
 * @group Google
 */
class InboundLinksTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'host' => 'www.horrorblog.org',
		));
		$this->fixture = new InboundLinks($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertTrue($result > 10);
	}
}