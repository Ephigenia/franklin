<?php

namespace Franklin\test\Facebook\FanCount;

use
	Franklin\test\config\Config,
	Franklin\test\config\Defintion,
	Franklin\test\config\type\String
	;

class FanCountConfig extends Config
{	
	public function init()
	{
		$this->definition->append(
			new String('id', true, null, 'id of graph item to track')
		);
		return true;
	}
}