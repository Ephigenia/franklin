<?php

namespace Franklin\test\config\type;

use
	Franklin\test\config\type\IP
	;

/**
 * @group Types
 */
class IPTest extends \PHPUnit_Framework_TestCase 
{
	public function setUp()
	{
		$this->fixture = new IP('ip');
	}
	
	public function invalidValues()
	{
		return array(
			array('12'),
			array(false),
			array(null),
			array('12.12.12'),
			array('12.12.12.12.12'),
			array('256.256.256.256'),
			array('99.99.99.99.999'),
			array(' 12.12.12.12.12 '),
			array(' 12.12.12.12'.PHP_EOL.'.12 '),
		);
	}
	
	/**
	 * @dataProvider invalidValues()
	 */
	public function testInvalid($value)
	{
		$this->assertFalse($this->fixture->validate($value));
	}
	
	public function validValues()
	{
		return array(
			array('1.2.3.4'),
			array('192.168.1.1'),
		);
	}
	
	/**
	 * @dataProvider validValues()
	 */
	public function testValid($value)
	{
		$this->assertTrue($this->fixture->validate($value));
	}
}