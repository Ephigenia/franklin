<?php

/**
 * Franklin: <http://code.marceleichner.de/project/franklin>
 * Copyright 2007+, Ephigenia M. Eichner, Kopernikusstr. 8, 10245 Berlin
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 * @license		http://www.opensource.org/licenses/mit-license.php The MIT License
 * @copyright	copyright 2007+, Ephigenia M. Eichner
 * @link		http://code.ephigenia.de/projects/franklin/
 */

/**
 * @package Franklin
 * @author Marcel Eichner // Ephigenia <love@ephigenia.de>
 * @since 2010-06-20
 */
class Log
{
	public static $level = 0;
	
	public static function write($level, $message)
	{
		if (self::$level < $level) {
			return false;
		}
		echo $message.LF;
		return true;
	}
}