<?php

namespace Franklin\test\GitHub\UserInfo;

use
	Franklin\test\config\type\String,
	Franklin\test\config\type\Integer
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('username', true, null, 'github username'),
			new String('key', true, 'followers', 'key that should be recorded (followers, following, public_repo, public_gist)')
		);
		return true;
	}
}