<?php

namespace Franklin\test\Twitter\Following;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('username', true, null, 'Username on twitter which numbers followers should be tracked.')
		);
		return true;
	}
	
	public function offsetGet($offset)
	{
		switch ($offset) {
			case 'url':
				return sprintf('https://twitter.com/%s', urlencode($this->username));
			case 'regexp':
				return '@data-nav="followers".*title="([\d\.\,]+)"@is';
		}
		return parent::offsetGet($offset);
	}
}