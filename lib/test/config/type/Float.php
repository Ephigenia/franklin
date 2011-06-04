<?php

namespace Franklin\test\config\type;

class Float extends Mixed
{
	public function validate($value)
	{
		return preg_match('@^\d+(.\d+)?$@', $value);
	}
}