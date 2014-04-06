<?php

namespace Franklin\test\config\type;

abstract class AbstractType
{
	public $name;
	
	public $default;
	
	public $description;
	
	public $required = true;
	
	public function __construct($name, $required = null, $default = null, $description = null)
	{
		$this->name = $name;
		if ($required !== null) {
			$this->required = (bool) $required;
		}
		if ($default !== null) {
			$this->default = $default;
		}
		if ($description !== null) {
			$this->description = $description;
		}
	}
	
	public function validate($value)
	{
		return true;
	}
}