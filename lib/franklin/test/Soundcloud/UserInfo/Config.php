<?php

namespace Franklin\test\Soundcloud\UserInfo;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('id', true, null, 'soundcloud track id'),
			new String('key', true, 'likes', 'Key of json result to inspect (track, playlist, followers, followings, public_favorites)')
		);
		return true;
	}
}