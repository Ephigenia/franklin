<?php

namespace Franklin\test\config\type;

class Email extends AbstractType
{
	public function validate($value)
	{
		return (bool) preg_match('/^[a-z0-9'.preg_quote("!#$%&'*+/=?^_`{|}~.-", '/').']{1,}@((?:[-a-z0-9]+\.)+[a-z]{2,})$/i', $value);
	}
}