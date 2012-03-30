<?php

namespace Franklin\test\config\type;

class Integer extends AbstractType
{
	public function validate($value)
	{
		return (!is_bool($value) && (bool) preg_match('@^-?\d+$@', $value));
	}
}