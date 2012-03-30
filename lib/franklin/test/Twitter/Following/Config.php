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
				return 'http://www.twitter.com/'.urlencode($this->username);
			case 'regexp':
				return '@id="following_count" class="stats_count numeric">([\d+.,]+)\s*</span>@i';
		}
		return parent::offsetGet($offset);
	}
}