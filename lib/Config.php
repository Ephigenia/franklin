<?php

class Config
{
	protected $data = array(
		'timezone' => 'Europe/Berlin',
		'theme' => 'amber',
		'groups' => array(),
	);
	
	public function __construct(Array $config = array())
	{
		$this->merge($config);
	}
	
	public function merge(Array $data = array())
	{
		$this->data = array_merge($this->data, $data);
		return $this;
	}
	
	public function __get($var)
	{
		return $this->data[$var];
	}
	
	public function __toString()
	{
		return var_export($this->data, true);
	}
}