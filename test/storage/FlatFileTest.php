<?php

namespace Franklin\test\config\type;

use
	Franklin\storage\FlatFile;

/**
 * @group Storage
 */
class FlatFileTest extends \PHPUnit_Framework_TestCase 
{
	protected $filename;
	
	public function setUp()
	{
		$this->filename = __DIR__.'/fixture/testfile.csv';
		$this->fixture = new FlatFile($this->filename);
	}
	
	public function testStore()
	{
		$today = new \DateTime('24.12.2012 12:34');
		$this->fixture->store($today, 1000);
		$this->assertFileExists($this->filename);
		$this->assertStringEqualsFile($this->filename, '2012-12-24T12:34:00+01:00;1000'."\n");
		unlink($this->filename);
	}
}