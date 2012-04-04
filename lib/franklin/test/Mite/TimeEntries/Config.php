<?php

namespace Franklin\test\Mite\TimeEntries;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('api_key', true, null, 'your mite API key'),
			new String('subdomain', true, null, 'your mite account subdomain'),
			new String('key', true, 'minutes', 'minutes or revenue')
		);
		return true;
	}
}