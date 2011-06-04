<?php

namespace Franklin\test\Facebook\PageLikes;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{	
	public function init()
	{
		$this->definition->append(
			new String('id', true, null, 'ID of the facebook page you want to track')
		);
		return true;
	}
}