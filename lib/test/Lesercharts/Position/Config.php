<?php

namespace Franklin\test\Lesercharts\Position;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('name', true, null, 'Name of website in lesercharts.de listing')
		);
		return true;
	}
	
	public function offsetGet($offset)
	{
		switch ($offset) {
			case 'url':
				return 'http://www.lesercharts.de';
			case 'regexp':
				return '@<td class="rank">(\d+)</td><td class="blog"><a href="[^"]+">'.preg_quote($this->name, '@').'</a>@';
		}
		return parent::offsetGet($offset);
	}
}