<?php

namespace Franklin\test\config\type;

class Integer extends Mixed
{
	public function validate($value)
	{
		return preg_match('@^\d+$@', $value);
	}
}