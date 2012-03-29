<?php

namespace Franklin\test\config\type;

use
	Franklin\test\config\type\String
	;

/**
 * @group Types
 */
class IntegerTest extends \PHPUnit_Framework_TestCase 
{
	public function setUp()
	{
		$this->fixture = new Integer('int');
	}
	
	public function invalidValues()
	{
		return array(
			array(''),
			array(null),
			array('asd1'),
			array(false),
			array(true),
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
			array(1),
			array(-1),
			array('1'),
			array('-1'),
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