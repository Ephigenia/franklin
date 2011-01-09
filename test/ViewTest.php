<?php

class ViewTest extends PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		Franklin_View::$root = __DIR__.'/fixtures/view';
	}
	
	public function test__toString()
	{
		$view = new Franklin_View('template', array('var' => 'value'));
		$this->assertEquals(
			(string) $view,
			'test view content value'
		);
	}
	
	public function testElement()
	{
		$view = new Franklin_View('template_w_element', array('var' => 'value'));
		$this->assertEquals(
			(string) $view,
			'test view content element content newvalue'
		);
	}
}