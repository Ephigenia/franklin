<?php

namespace Franklin\test\Facebook\PageTalkingAbout;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{	
	public function init()
	{
		$this->definition->append(
			new String('id', true, null, 'slug of the facebook page')
		);
		return true;
	}
}