<?php

namespace Franklin\test\Sistrix\Sichtbarkeitsindex\test;

use
	Franklin\test\Sistrix\Sichtbarkeitsindex\Sichtbarkeitsindex,
	Franklin\test\Sistrix\Sichtbarkeitsindex\Config
	;

/**
 * @group Tests
 * @group Sistrix
 */
class SichtbarkeitsindexTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'host' => 'horrorblog.org',
		));
		$this->fixture = new Sichtbarkeitsindex($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(0, $result);
	}
}