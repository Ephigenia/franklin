<?php

namespace Franklin\test\config\type;

class Mixed
{
	public $name;
	
	public $default;
	
	public $description;
	
	public $required = true;
	
	public function __construct($name, $required = null, $default = null, $description = null)
	{
		$this->name = $name;
		$this->required = $required;
		$this->default = $default;
		$this->description = $description;
	}
	
	public function validate($value)
	{
		return true;
	}
}