<?php

namespace Franklin\test\Facebook\URLLikes;

use
	Franklin\test\config\type\URL,
	Franklin\test\config\type\Enum
	;

class Config extends \Franklin\test\config\Config
{	
	public function init()
	{
		$this->definition->append(
			new URL('url', true, null, 'URL of the website which number of likes should be tracked')
		);
		$types = new Types();
		$typeConfigVariable = new Enum('type', true, Types::LIKES, 'Counter that should be tracked');
		$typeConfigVariable->options = $types;
		$this->definition->append($typeConfigVariable);
		return true;
	}
}