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
		$this->assertInternalType('integer', $result);
		$this->assertGreaterThan(1000, $result);
	}

	public function testWithComplicatedUrl()
	{
		$this->fixture->config['url'] = 'http://locationinsider.de/interview-raul-krauthausen-arbeitet-an-verschiedenen-projekten-fuer-mehr-barrierefreiheit/';
		$result = $this->fixture->run();
		$this->assertInternalType('integer', $result);
		$this->assertGreaterThan(10, $result);
	}

	public function testInvalidUrl() 
	{
		$this->fixture->config['url'] = 'asldkjasdlk';
		$result = $this->fixture->run();
		$this->assertInternalType('boolean', $result);
		$this->assertFalse($result);
	}
}