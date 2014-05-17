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
				return 'http://klout.com/'.urlencode($this->username);
			case 'regexp':
				return '/<span class="score">(\d+)<\/span>/i';
		}
		return parent::offsetGet($offset);
	}
}