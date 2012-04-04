<?php

namespace Franklin\test\Yahoo\Finance\test;

use
	Franklin\test\Yahoo\Finance\Quote,
	Franklin\test\Yahoo\Finance\Config
	;

/**
 * @group Tests
 * @group Yahoo
 * @group Finance
 */
class QuoteTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'symbol' => 'AAPL',
		));
		$this->fixture = new Quote($config);
	}
	
	public function testRun()
	{
		$result = $this->fixture->run();
		$this->assertGreaterThan(200, $result);
	}
	
	public function testMultipleSymbols()
	{
		$this->fixture->config->symbol = 'AAPL+RIMM';
		$result = $this->fixture->run();
		$this->assertGreaterThan(200, $result);
	}
	
	public function testInvalidSymbol()
	{
		$this->fixture->config->symbol = '<not-existent-symbol>';
		$result = $this->fixture->run();
		$this->assertEquals(0, $result);
	}
}