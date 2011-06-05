<?php

namespace Franklin\test\Yahoo\Backlinks;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
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
			case 'url':
				return 'http://siteexplorer.search.yahoo.com/de/siteexplorer/search?p='.$this->host.'&bwm=p&bwms=p&fr=sfp&fr2=seo-rd-se';
			case 'regexp':
				return '@Backlinks\s\(([\d.]+)@';
		}
		return parent::offsetGet($offset);
	}
}