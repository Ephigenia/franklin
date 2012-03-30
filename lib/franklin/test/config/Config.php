<?php

namespace Franklin\test\config;

use
	Franklin\test\config\Definition,
	ArrayObject
	;

abstract class Config extends ArrayObject
{
	protected $definition;
	
	public function __construct(Array $options = array())
	{
		$this->definition = new Definition();
		parent::__construct(array(), ArrayObject::ARRAY_AS_PROPS);
		$this->init();
		$this->configure($options);
	}
	
	protected function init()
	{
		return true;
	}
	
	public function offsetSet($offset, $value)
	{
		if (!isset($this->definition[$offset])) {
			throw new ConfigUndefinedVariableException($this, $key);
		}
		if ($this->definition[$offset]->required && !$this->definition[$offset]->validate($value)) {
			throw new ConfigInvalidVariableValueException($offset, $value);
		}
		parent::offsetSet($offset, $value);
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
			if (!$definition->required) {
				continue;
			}
			if (empty($this[$definition->name])) {
				throw new ConfigVariableRequiredException($this, $definition->name);
			}
			if ($definition->required) {
				$definition->validate($this[$definition->name]);
			}
		}
		return true;
	}
}

class Exception extends \Exception {}

class ConfigVariableException extends Exception {}

class ConfigVariableRequiredException extends ConfigVariableException
{
	public function __construct(Config $config, $key)
	{
		parent::__construct(sprintf('required config variable "%s" is not set or empty', get_class($config), $key));
	}
}

class ConfigUndefinedVariableException extends ConfigVariableException
{
	public function __construct(Config $config, $key)
	{
		parent::__construct(sprintf('%s does not define a config variable "%s"', get_class($config), $key));
	}
}

class ConfigInvalidVariableValueException extends ConfigVariableException
{
	public function __construct($key, $value)
	{
		parent::__construct(sprintf('unable to validate "%s" for "%s".', $value, $key));
	}
}