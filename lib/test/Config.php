<?php

namespace Franklin\test;

/**
 * A Test’s Configuration
 * 
 * Simple array wrapper class that hold configuration variables for a test.
 * @author Marcel Eichner // Ephigenia <love@ephigenia.de>
 * @since 0.3
 */
class Config extends \ArrayObject
{
	protected $defaults = array();
	
	public function __construct(Array $config = array())
	{
		parent::__construct(array(), \ArrayObject::ARRAY_AS_PROPS);
		foreach(($config + $this->defaults) as $key => $value) {
			$this[$key] = $value;
		}
		return $this;
	}
}