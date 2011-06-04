<?php

namespace Franklin\test\config;

use
	Franklin\test\config\Definition
	;

class Config extends \ArrayObject
{
	protected $definition;
	
	public function __construct(Array $options = array())
	{
		$this->definition = new Definition();
		$this->init();
		$this->configure($options);
	}
	
	public function init()
	{
		return true;
	}
	
	public function offsetSet($key, $value)
	{
		if (!isset($this->definition[$key])) {
			throw new ConfigVarNotDefinedException($this, $key);
		} elseif ($this->definition[$key]->validate($value)) {
			throw new ConfigVarInvalidException($key, $value);
		}
		parent::offsetSet($key, $value);
	}
	
	public function configure(Array $options = array())
	{
		foreach($this->definition as $key => $var) {
			if (isset($options[$var->name])) {
				$this[$var->name] = $options[$var->name];
			} else {
				$this[$var->name] = $var->default;
			}
		}
		return true;
	}
}

class Exception extends \Exception
{ }

class ConfigVarException extends Exception {}

class ConfigVarNotDefinedException extends ConfigVarException
{
	public function __construct(Config $config, $key)
	{
		parent::__construct(sprintf('%s does not define a config variable "%s"', get_class($config), $key));
	}
}

class ConfigVarInvalidException extends ConfigVarException
{
	public function __construct($key, $value)
	{
		parent::__construct(sprintf('Invalid valur for "%s" passed: "%s".', $key, $value));
	}
}