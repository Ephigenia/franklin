<?php

namespace Franklin\test\config\type;

class String extends Mixed
{
	public function validate($value)
	{
		return (!is_bool($value) && (bool) preg_match('@^[\w\d\s]+$@', $value));
	}
}