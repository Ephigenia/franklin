<?php

namespace Franklin\test\Sistrix\Sichtbarkeitsindex;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('host', true, null, 'Name of the host where index pages on yahoo should be counted')
		);
		return true;
	}
	
	public function offsetGet($offset)
	{
		switch ($offset) {
			case 'url':
				return 'http://www.sichtbarkeitsindex.de/'.preg_replace('@^www\.@', '', $this->host).'';
			case 'regexp':
				return '@<h3>([\d,]+)<\/h3>@';
		}
		return parent::offsetGet($offset);
	}
}