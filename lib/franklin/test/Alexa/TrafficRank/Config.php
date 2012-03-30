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
			new String('host', true, null, 'Host of which the inbound links should be searched'),
			new String('country_code', false, null, 'Host of which the inbound links should be searched')
		);
		return true;
	}
	
	public function offsetGet($offset)
	{
		switch ($offset) {
			case 'regexp':
				if (!empty($this->country_code)) {
					return '@'.strtoupper($this->country_code).'<\/a>:\s+([\d,.]+)@is';
				} else {
					return '@trafficstats">\s+([\d,.]+)@i';
				}
			case 'url':
				return 'http://www.alexa.com/search?r=site_site&q='.urlencode($this->host);
				break;
		}
		return parent::offsetGet($offset);
	}
}