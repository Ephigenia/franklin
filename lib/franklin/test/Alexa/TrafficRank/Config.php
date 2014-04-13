<?php

namespace Franklin\test\Alexa\TrafficRank;

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
			case 'regexp':
				return "@alt='Global rank icon'><strong class=\"metrics-data align-vmiddle\">([\.\,\d]+)<\/strong>@i";
				break;
			case 'url':
				return sprintf('http://www.alexa.com/siteinfo/%s', urlencode($this->host));
				break;
		}
		return parent::offsetGet($offset);
	}
}