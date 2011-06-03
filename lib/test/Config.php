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
			$this[$k] = $v;
		}
		return $this;
	}
	
	public function offsetSet($key, $value)
	{
		if (method_exists($this, 'set'.ucFirst($key))) {
			return $this->{'set'.ucFirst($key)}($value);
		}
		return parent::offsetSet($key, $value);
	}
	
	public function offsetGet($key)
	{
		if (method_exists($this, 'get'.ucFirst($key))) {
			return $this->{'get'.ucFirst($key)}($value);
		}
		return parent::offsetGet($key, $value);
	}
}