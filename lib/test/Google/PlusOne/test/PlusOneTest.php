<?php

namespace Franklin\test\Google\Results\test;

use
	Franklin\test\Google\PlusOne\PlusOne,
	Franklin\test\Google\Plusone\Config
	;

/**
 * @group Tests
 * @group Google
 * @group PlusOne
 */
class PlusOneTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'url' => 'http://www.spiegel.de',
		));
		$this->fixture = new PlusOne($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		var_dump('result: '.$result);
		$this->assertTrue($result > 1000);
	}
}