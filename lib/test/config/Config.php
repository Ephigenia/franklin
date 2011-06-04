<?php

namespace Franklin\test\config;

use
	Franklin\test\config\Definition,
	ArrayObject
	;

class Config extends ArrayObject
{
	protected $definition;
	
	public function __construct(Array $options = array())
	{
		$this->definition = new Definition();
		parent::__construct(array(), ArrayObject::ARRAY_AS_PROPS);
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
		} elseif (!$this->definition[$key]->validate($value)) {
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
	
	public function validate()
	{
		foreach($this->definition as $definition) {
			if ($definition->required && empty($this[$definition->name])) {
				throw new ConfigVarNotDefinedException($this, $definition->name);
			}
			$definition->validate($this[$definition->name]);
		}
		return true;
	}
}

class Exception extends \Exception
{ }

class ConfigVarException extends Exception {}

class ConfigVarRequiredException extends ConfigVarException
{
	public function __construct(Config $config, $key)
	{
		parent::__construct(sprintf('required config variable "%s" is not set or empty', get_class($config), $key));
	}
}

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