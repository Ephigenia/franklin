<?php

namespace Franklin\test\Google\PlusOne;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('url', true, null, 'complete url string for that google plus one counts should be tracked')
		);
		return true;
	}
}