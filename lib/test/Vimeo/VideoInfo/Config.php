<?php

namespace Franklin\test\Vimeo\VideoInfo;

use
	Franklin\test\config\type\String,
	Franklin\test\config\type\Integer
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new Integer('id', true, null, 'video id'),
			new String('key', true, 'likes', 'Key of json result to inspect (likes, plays, comments)')
		);
		return true;
	}
}