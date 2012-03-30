<?php

namespace Franklin\test\Bing\IndexedPages;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\Bing\Results\Config
{
	public function init()
	{
		$this->definition->append(
			new String('host', true, null, 'Host of which the indexed pages should be searched')
		);
		return true;
	}
	
	public function offsetGet($offset)
	{
		switch ($offset) {
			case 'q':
				return 'site:'.$this->host;
		}
		return parent::offsetGet($offset);
	}
}