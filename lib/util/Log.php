<?php

namespace Franklin\util;

class Log
{
	public static $level = 0;
	
	public static function write($level = LOG_USER, $message)
	{
		if (self::$level < $level) {
			return false;
		}
		echo $message;
		return true;
	}
}