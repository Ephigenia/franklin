<?php

namespace Franklin\test\config\type;

class String extends Mixed
{
	public function validate($value)
	{
		if (is_bool($value)) {
			return false;
		}
		if (!$this->required && empty($value)) {
			return true;
		}
		return (bool) preg_match('@^.+$@', $value);
	}
}