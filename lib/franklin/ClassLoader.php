<?php

namespace Franklin;

class ClassLoader extends \ArrayObject
{
	public function offsetSet($namespace, $path)
	{
		$realpath = realpath($path);
		if (!is_dir($realpath)) {
			throw new ClassLoaderPathNotFoundException($path);
		}
		return parent::
		$this[$namespace] = $realpath;
		
	}

	public function load($path)
	{
		foreach($this as $namespace => $libPath) {
			if (strncasecmp($path, $namespace, strlen($namespace)) === 0) {
				$path = $libPath.DIRECTORY_SEPARATOR.substr(str_replace('\\', DIRECTORY_SEPARATOR, $path), strlen($namespace)+1).'.php';
				break;
			}
		}
		if (is_file($path)) {
			return require $path;
		}
		return false;
	}
	
	public function registerAutoLoader()
	{
		spl_autoload_register(array($this, 'load'), true, true);
	}
}


class ClassLoaderException extends \RuntimeException {}

class ClassLoaderPathNotFoundException extends ClassLoaderException
{
	public function __construct($filename)
	{
		return parent::__construct(sprintf('Path "%s" could not be found.', $filename));
	}
}