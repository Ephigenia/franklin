<?php

namespace Franklin\view;

class View extends \ArrayObject
{
	public static $baseDir;
	
	protected $extension = 'php';
	
	protected $filename;
	
	public function __construct($filename, Array $data = array())
	{
		$this->filename = $filename;
		parent::__construct((array) $data, \ArrayObject::ARRAY_AS_PROPS);
		return $this;
	}
	
	public function element($name, Array $data = array())
	{
		return new Franklin\view\Element($name, $data + (array) $this);
	}
	
	protected function filename()
	{
		return self::$baseDir.$this->filename.'.'.$this->extension;
	}
	
	public function __toString()
	{
		if (!is_file($this->filename())) {
			throw new ViewTemplateFileNotFoundException($this->filename());
		}
		extract((array) $this, EXTR_OVERWRITE);
		ob_start();
		require $this->filename();
		return ob_get_clean();
	}
}

class ViewException extends \Exception {}

class ViewTemplateFileNotFoundException extends ViewException
{
	public function __construct($filename)
	{
		return parent::__construct(sprintf('View template file "%s" could not be found', $filename));
	}
}