<?php

namespace Franklin\test\Yahoo\Finance;

use
	Franklin\test\config\type\String
	;

/**
 * 	http://www.gummy-stuff.org/Yahoo-data.htm
 */
class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('format', false, 'ab', 'format, first value will be stored'),
			new String('symbol', true, null, 'symbol of the stock')
		);
		return true;
	}
}