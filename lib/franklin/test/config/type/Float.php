<?php

namespace Franklin\test\config\type;

class Float extends AbstractType
{
	public function validate($value)
	{
		if (is_bool($value)) {
			return false;
		}
		return (bool) preg_match('@^-?\d+(.\d+)?$@', $value);
	}
}