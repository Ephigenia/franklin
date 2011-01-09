<?php

use \Franklin\test\FacebookGroupFansCount;

class FacebookGroupFansCountTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->fixture = new FacebookGroupFansCount(array(
			'id' => '115046791864216',
		));
	}
	
	public function testRun()
	{
		echo $this->fixture;
		$this->assertInternalType('integer', $this->fixture->run());
	}
}