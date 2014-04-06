<?php

namespace Franklin\test\config\type;

class String extends AbstractType
{
	public function validate($value)
	{
		if (is_bool($value)) {
			return false;
		}
		return !empty($value);
	}
}