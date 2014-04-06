<?php

namespace Franklin\test\Klout\Score;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('username', true, null, 'twitter username')
		);
		return true;
	}
	
	public function offsetGet($offset)
	{
		switch ($offset) {
			case 'url':
				return 'http://widgets.klout.com/badge/'.urlencode($this->username).'?size=s';
			case 'regexp':
				return '@class=["\' ]+kscore[ "\']+title=[ "\'](\d+)[ "\']@i';
		}
		return parent::offsetGet($offset);
	}
}