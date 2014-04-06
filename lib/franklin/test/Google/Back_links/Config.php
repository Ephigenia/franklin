<?php

namespace Franklin\test\Google\BackLinks;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\Google\Results\Config
{
	public function init()
	{
		$this->definition->append(
			new String('host', true, null, 'Host of which the inbound links should be searched')
		);
		return true;
	}
	
	public function offsetGet($offset)
	{
		switch ($offset) {
			case 'q':
				return 'link:'.$this->host;
		}
		return parent::offsetGet($offset);
	}
}