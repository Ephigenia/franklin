<?php

namespace Franklin\test\config;

use
	Franklin\test\config\type\Mixed
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
	
	public function append(Mixed $definition)
	{
		parent::offsetSet($definition->name, $definition);
	}
}