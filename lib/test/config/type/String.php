<?php

namespace Franklin\test\config\type;

class String extends Mixed
{
	public function validate($value)
	{
		if (!$this->required && empty($value)) {
			return true;
		}
		return (!is_bool($value) && (bool) preg_match('@^.+$@', $value));
	}
}