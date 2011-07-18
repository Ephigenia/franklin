<?php

namespace Franklin\test\config\type;

use
	Franklin\test\config\type\Float;

/**
 * @group Types
 */
class FloatTest extends \PHPUnit_Framework_TestCase 
{
	public function setUp()
	{
		$this->fixture = new Float('float');
	}
	
	public function invalidValues()
	{
		return array(
			array(false),
			array(true),
			array('- 123.2'),
			array('asd'),
			array('-12l.2'),
			array('a.1'),
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
			array(123.2),
			array('12.2'),
			array('-12.2')
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