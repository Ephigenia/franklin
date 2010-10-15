<?php

/**
 * Franklin: <http://code.marceleichner.de/project/franklin>
 * Copyright 2009+, Ephigenia M. Eichner, Kopernikusstr. 8, 10245 Berlin
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 * @license		http://www.opensource.org/licenses/mit-license.php The MIT License
 * @copyright	copyright 2007+, Ephigenia M. Eichner
 * @link			http://code.ephigenia.de/projects/franklin/
 * @filesource
 */

class_exists('Object') or require dirname(__FILE__).'/Object.php';

/**
 * Simple Log Class
 * @package Franklin
 * @author Marcel Eichner // Ephigenia <love@ephigenia.de>
 * @since 2010-06-20
 */
class Log extends Object
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