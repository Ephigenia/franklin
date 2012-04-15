<?php

namespace Franklin\test\XBox360\Gamerscore;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('username', true, null, 'xbox 360 gamertag/username')
		);
		return true;
	}
}