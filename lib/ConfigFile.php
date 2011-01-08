<?php

require __DIR__.'/Config.php';

class ConfigFile extends Config
{
	public function __construct($filename)
	{
		$this->load((string) $filename);
	}
	
	protected function load($filename)
	{
		if (!is_file($filename)) {
			throw new ConfigFileNotFoundException($filename);
		}
		require $filename;
		if (!isset($config)) {
			throw new ConfigNotFoundException();
		}
		return $this->data = array_merge($config);
	}
}

class ConfigFileException extends Exception {}
class ConfigNotFoundException extends ConfigFileException {}
class ConfigFileNotFoundException extends ConfigFileException {}