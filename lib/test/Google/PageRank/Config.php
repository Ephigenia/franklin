<?php

namespace Franklin\test\Google\PageRank;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('host', true, null, 'Hostname of website which pagerank should be tracked')
		);
		return true;
	}
}