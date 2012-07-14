<?php

namespace Franklin\test\XML\XPath\test;

use
	Franklin\test\XML\XPath\XPath,
	Franklin\test\XML\XPath\Config
	;

/**
 * @group XML
 * @group XPath
 */
class XPathTest extends \PHPUnit_Framework_TestCase
{
	public function testXPathNode()
	{
		$config = new Config(array(
			'url' => 'http://www.xmlfiles.com/examples/cd_catalog.xml',
			'xpath' => '/CATALOG/CD/YEAR',
		));
		$test = new XPath($config);
		$result = $test->run();
		$this->assertGreaterThan(1900, $result);
	}
	
	public function testInvalidXPath()
	{
		$config = new Config(array(
			'url' => 'http://www.xmlfiles.com/examples/cd_catalog.xml',
			'xpath' => '/invalid/nodename',
		));
		$test = new XPath($config);
		$result = $test->run();
		$this->assertEquals(0, $result);
	}
}