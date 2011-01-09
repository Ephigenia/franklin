<?php

use \Franklin\view\View;

class ViewTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		View::$root = __DIR__.'/fixtures/view';
	}
	
	public function test__toString()
	{
		$view = new View('template', array('var' => 'value'));
		$this->assertEquals(
			(string) $view,
			'test view content value'
		);
	}
	
	public function testElement()
	{
		$view = new View('template_w_element', array('var' => 'value'));
		$this->assertEquals(
			$view->render(),
			'test view content element content newvalue'
		);
	}
}