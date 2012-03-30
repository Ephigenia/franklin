<?php

namespace Franklin\test\config;

use
	Franklin\test\config\type\AbstractType
	;

class Definition extends \ArrayObject
{
	public function __construct(Array $definitions = array())
	{
		$cleaned = array();
		foreach($definitions as $definition) {
			$cleaned[$definition->name] = $definition;
		}
		return parent::__construct($cleaned, \ArrayObject::ARRAY_AS_PROPS);
	}
	
	public function append($definition)
	{
		$args = func_get_args();
		if (is_array($args[0])) {
			$args = $args[0];
		}
		foreach($args as $definition) {
			if (!($definition instanceof AbstractType)) {
				throw new \InvalidArgumentException('Defintions must extend from AbstractType');
			}
			parent::offsetSet($definition->name, $definition);
		}
		return $this;
	}
}