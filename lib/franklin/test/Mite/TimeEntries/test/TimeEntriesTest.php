<?php

namespace Franklin\test\Mite\TimeEntries\test;

use
	Franklin\test\Mite\TimeEntries\TimeEntries,
	Franklin\test\Mite\TimeEntries\Config
	;

/**
 * @group Tests
 * @group Mite
 */
class PositionTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'api_key' => MITE_API_KEY,
			'subdomain' => MITE_API_SUBDOMAIN,
		));
		$this->fixture = new TimeEntries($config);
	}
	
	public function testRunMinutes()
	{
		$this->fixture->config->key = 'minutes';
		$result = $this->fixture->run();
		$this->assertInternalType('integer', $result);
	}
	
	public function testRunRevenue()
	{
		$this->fixture->config->key = 'revenue';
		$result = $this->fixture->run();
		$this->assertInternalType('float', $result);
	}
}