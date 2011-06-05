<?php

namespace Franklin\test\Wikio\Score;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('id', true, null, 'hostname of website that should be tracked on wikio.de')
		);
		return true;
	}
	
	public function offsetGet($offset)
	{
		switch ($offset) {
			case 'url':
				return 'http://www.wikio.de/sources/'.$this->id;
			case 'regexp':
				return '@wikio-score:[^\d]+([0-9.]+)@is';
		}
		return parent::offsetGet($offset);
	}
}