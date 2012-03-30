<?php

namespace Franklin\test\Vimeo\UserInfo;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('username', true, null, 'username of the user to inspect'),
			new String('key', true, 'contacts', 'Key of json result to inspect (videos_uploaded, videos_appears_in, videos_liked, contacts, albums, channels)')
		);
		return true;
	}
}