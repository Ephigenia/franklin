<?php

namespace Franklin\test\config\type;

class Float extends Mixed
{
	public function validate($value)
	{
		return (!is_bool($value) && (bool) preg_match('@^-?\d+(.\d+)?$@', $value));
	}
}