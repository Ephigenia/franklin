<?php

namespace Franklin;

class Config extends \ArrayObject
{
	protected $defaults = array(
		'timezone' => 'Europe/Berlin',
		'theme' => 'amber',
		'groups' => array(),
	);
	
	public function __construct(Array $config = array())
	{
		return parent::__construct(
			(array) $config + $this->defaults,
			\ArrayObject::ARRAY_AS_PROPS
		);
	}
}