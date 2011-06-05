<?php

namespace Franklin\test\Yahoo\Backlinks\test;

use
	Franklin\test\Yahoo\Backlinks\Backlinks,
	Franklin\test\Yahoo\Backlinks\Config
	;

/**
 * @group Tests
 * @group Yahoo
 */
class BacklinksTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'host' => 'horrorblog.org',
		));
		$this->fixture = new Backlinks($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(20, $result);
	}
}