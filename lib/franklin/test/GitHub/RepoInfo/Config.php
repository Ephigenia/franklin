<?php

namespace Franklin\test\GitHub\RepoInfo;

use
	Franklin\test\config\type\String,
	Franklin\test\config\type\Integer
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('username', true, null, 'username'),
			new String('repository', true, null, 'repository name'),
			new String('key', true, 'followers', 'key that should be recorded (open_issues, watchers, forks, size, sloc)')
		);
		return true;
	}
}