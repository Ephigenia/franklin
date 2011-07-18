<?php

namespace Franklin\test\Feedburner;

use
	Franklin\test\config\type\String,
	Franklin\test\config\type\Enum,
	Franklin\test\Feedburner\Types
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('uri', true, null, 'URI of the feed as set in feedburner')
		);
		$types = new Types();
		$typeConfigVariable = new Enum('type', true, Types::READERS, 'Counter that should be tracked');
		$typeConfigVariable->options = $types;
		$this->definition->append($typeConfigVariable);
		return true;
	}
	
	public function offsetGet($offset)
	{
		switch ($offset) {
			case 'url':
				return 'http://feedburner.google.com/api/awareness/1.0/GetFeedData?uri='.$this->uri.'&dates='.date('Y-m-d', strtotime('-1 day'));
			case 'regexp':
				switch ($this->type) {
					case Types::READERS:
						return '@circulation="(\d+)"@i';
					case Types::HITS:
						return '@hits="(\d+)"@i';
				}
		}
		return parent::offsetGet($offset);
	}
}