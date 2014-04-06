<?php

namespace Franklin\test\config\type;

use
	Franklin\test\config\type\String
	;

/**
 * @group Types
 */
class StringTest extends \PHPUnit_Framework_TestCase 
{
	public function setUp()
	{
		$this->fixture = new String('string');
	}
	
	public function invalidValues()
	{
		return array(
			array(false),
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
			array('string'),
			array('string with spaces'),
			array('string with numbers and sp8ces'),
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