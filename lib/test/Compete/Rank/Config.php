<?php

namespace Franklin\test\Compete\Rank;

use
	Franklin\test\config\type\String,
	Franklin\test\config\type\Enum
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('host', true, null, 'hostname of the website that should be tracked.'),
			new String('api_key', true, null, 'API Key aquired from compete.com')
		);
		$metrics = new Metrics();
		$typeConfigVariable = new Enum('metric', true, Metrics::VISITS, 'Counter that should be tracked');
		$typeConfigVariable->options = $metrics;
		$this->definition->append($typeConfigVariable);
		return true;
	}
}