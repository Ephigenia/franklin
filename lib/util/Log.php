<?php

namespace Franklin\util;

use Franklin\util\DebugLevel;

class Log
{
	public static $level = 0;
	
	public static function write($level = DebugLevel::SILENT, $message)
	{
		if (self::$level < $level) {
			return false;
		}
		echo $message;
		return true;
	}
}