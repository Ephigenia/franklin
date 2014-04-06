<?php

namespace Franklin\test\Facebook\ApplicationActivity\test;

use
	Franklin\test\Facebook\ApplicationActivity\ApplicationActivity,
	Franklin\test\Facebook\ApplicationActivity\Config
	;

/**
 * @group Tests
 * @group Facebook
 */
class ApplicationActivityTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'id' => '102452128776', // farmville id
		));
		$this->fixture = new ApplicationActivity($config);
	}
	
	public function getPossibleKeys()
	{
		return array(
			array('daily', 'integer', 1),
			array('weekly', 'integer', 5),
			array('monthly', 'integer', 10),
		);
	}
	
	/**
	 * @dataProvider getPossibleKeys
	 */
	public function testSomething($key, $expectedInternalType, $minValue)
	{
		$this->fixture->config->key = $key;
		$result = $this->fixture->run();
		$this->assertInternalType($expectedInternalType, $result);
		$this->assertGreaterThanOrEqual($minValue, $result);
	}
}