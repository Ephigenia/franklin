<?php

namespace Franklin\test\config\type;

use
	Franklin\test\config\type\String
	;

/**
 * @group Types
 */
class URLTest extends \PHPUnit_Framework_TestCase 
{
	public function setUp()
	{
		$this->fixture = new URL('url');
	}
	
	public function invalidValues()
	{
		return array(
			array(''),
			array(null),
			array('asd1'),
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
			array('http://www.hostname.de'),
			array('https://sub.sub.domain.com/?data[index]=value&foo=bar&amp;foo=Lost%20in%20Space'),
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