<?php

namespace Franklin\test\Ebuzzing\Score;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('id', true, null, 'hostname of website that should be tracked on ebuzzing')
		);
		return true;
	}
	
	public function offsetGet($offset)
	{
		switch ($offset) {
			case 'url':
				return 'http://labs.ebuzzing.de/top-blogs/source/'.$this->id;
			case 'regexp':
				return '&wikioScore">.*>([\d\.]+)&is';
		}
		return parent::offsetGet($offset);
	}
}