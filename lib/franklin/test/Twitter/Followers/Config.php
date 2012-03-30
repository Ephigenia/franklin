<?php

namespace Franklin\test\Twitter\Followers;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('username', true, null, 'username of twitter user who’s number of followers should be tracked')
		);
		return true;
	}
	
	public function offsetGet($offset)
	{
		switch ($offset) {
			case 'url':
				return 'http://www.twitter.com/'.urlencode($this->username);
			case 'regexp':
				return '@id="follower_count" class="stats_count numeric">([\d+.,]+)\s*</span>@i';
		}
		return parent::offsetGet($offset);
	}
}