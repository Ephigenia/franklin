<?php

namespace Franklin\test\PSNetwork\Trophies;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('username', true, null, 'psnetwork username'),
			new String('key', true, 'total', 'key (total, level, platinum, gold, silver, bronze)')
		);
		return true;
	}
}