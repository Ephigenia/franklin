<?php

class Library
{
	protected static $paths = array();
	
	protected static $devider = '_';
	
	public static function add($namespace, $path)
	{
		if (!is_dir($path)) {
			throw new LibraryPathNotFoundException($path);
		}
		self::$paths[$namespace] = $path;
	}
	
	public static function load($classpath)
	{
		foreach(self::$paths as $namespace => $libPath) {
			if (strncasecmp($classpath, $namespace, strlen($namespace)) == 0) {
				$path = $libPath.DIRECTORY_SEPARATOR.substr(str_replace(self::$devider, DIRECTORY_SEPARATOR, $classpath), strlen($namespace) + 1).'.php';
			}
		}
		if (empty($path)) {
			throw new Exception($classpath.' not found');
		}
		require $path;
	}
}

class LibraryException extends Exception {}
class LibraryPathNotFoundException extends LibraryException {}

spl_autoload_register('Library::load');
Library::add('Franklin', realpath(__DIR__));