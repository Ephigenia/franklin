<?php

namespace Franklin\test\Bing\Results;

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
				return 'http://www.bing.com/search?q='.urlencode($this->q).'&go=&form=QBLH&filt=all&qs=n&sk=';
			case 'regexp':
				return '@<span.*class="sb_count">([\d\.\,]+)@i';
		}
		return parent::offsetGet($offset);
	}
}