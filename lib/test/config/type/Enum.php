<?php

namespace Franklin\test\config\type;

class Enum extends Mixed
{
	public $options = array();
	
	public function validate($value)
	{
		return array_key_exists($value, (array) $this->options);
	}
}
