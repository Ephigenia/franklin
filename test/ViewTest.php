<?php

require 'app/lib/View.php';

class ViewTest extends PHPUnit_Framework_TestCase
{
	public function testViewCreation()
	{
		$view = new View('report');
		$this->assertInstanceOf('View', $view);
	}
	
	public function testViewNotFoundException()
	{
		try {
			$view = new View('not Found');
		} catch (ViewFileNotFoundException $e) {
			return true;
		}
		$this->fail('Expected VieFileNotFoundException');
	}
}