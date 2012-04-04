<?php

namespace Franklin\test\XML\XPath;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

/**
 * http://www.w3schools.com/xpath/xpath_syntax.asp
 */
class XPath extends Test
{
	public $name = 'XML XPath';
	
	public $description = 'Store data specified by a xpath from an xml source.';
	
	public function init()
	{
		// check if SimpleXML available
		if (!function_exists('simplexml_load_file')) {
			throw new \RuntimeException('SimpleXML not available.');
		}
		return parent::init();
	}
	
	public function run()
	{
		$this->beforeRun();
		$CURL = new CURL();
		$result = $CURL->get($this->config->url);
		if ($result && $xmlElement = new \SimpleXMLElement($result)) {
			$foundNodes = $xmlElement->xpath($this->config->xpath);
			if (isset($foundNodes[0])) {
				return (float) $foundNodes[0];
			}
		}
		return 0;
	}
}