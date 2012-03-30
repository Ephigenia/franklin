<?php

namespace Franklin\test\Google\Results;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('q', true, null, 'Query that should be searched')
		);
		return true;
	}
	
	public function offsetGet($offset)
	{
		switch ($offset) {
			case 'url':
				return 'http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q='.urlencode($this->q);
			case 'regexp':
				return '@estimatedResultCount":"([^"]+)"@i';
		}
		return parent::offsetGet($offset);
	}
}