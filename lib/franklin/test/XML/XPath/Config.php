<?php

namespace Franklin\test\XML\XPath;

use
	Franklin\test\config\type\URL,
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new URL('url', true, null, 'url'),
			new String('xpath', true, null, 'xpath expression pointing to the xml node value to store')
		);
		return true;
	}
}