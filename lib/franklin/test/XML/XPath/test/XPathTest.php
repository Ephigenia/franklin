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
			'url' => 'https://github.com/api/v2/xml/user/show/ephigenia',
			'xpath' => '/user/public-gist-count',
		));
		$test = new XPath($config);
		$result = $test->run();
		$this->assertGreaterThan(5, $result);
	}
	
	public function testInvalidXPath()
	{
		$config = new Config(array(
			'url' => 'https://github.com/api/v2/xml/user/show/ephigenia',
			'xpath' => '/invalid/nodename',
		));
		$test = new XPath($config);
		$result = $test->run();
		$this->assertEquals(0, $result);
	}
}