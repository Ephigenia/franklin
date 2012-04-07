<?php

namespace Franklin\test\Flattr\Flattrs;

use
	Franklin\test\config\type\String,
	Franklin\test\config\type\Integer
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('url', false, null, 'URL of a thing on flattr'),
			new String('username', false, null, 'flattr username'),
			new Integer('thing', false, null, 'flattr thing id')
		);
		return true;
	}
}