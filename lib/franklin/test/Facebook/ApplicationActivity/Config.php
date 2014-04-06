<?php

namespace Franklin\test\Facebook\ApplicationActivity;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{	
	public function init()
	{
		$this->definition->append(
			new String('id', true, null, 'Application id of the game you want to track.'),
			new String('key', true, 'daily', 'time frame of active user count to track (daily, weekly, monthly)')
		);
		return true;
	}
}