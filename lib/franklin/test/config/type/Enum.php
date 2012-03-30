<?php

namespace Franklin\test\config\type;

class Enum extends AbstractType
{
	public $options = array();
	
	public function validate($value)
	{
		if (!$this->required && empty($value)) {
			return true;
		}
		return array_key_exists($value, (array) $this->options);
	}
}
