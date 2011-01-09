<?php

class View
{
	public static $root;
	
	protected $template;
	
	protected $data = array();
	
	public function __construct($filename, Array $data)
	{
		$this->template = $filename;
		$this->data = $data + $this->data;
	}
	
	public function element($name, Array $data = array())
	{
		class_exists('Element') or require __DIR__.'/Element.php';
		return new Element($name, $data +  $this->data);
	}
	
	protected function filename()
	{
		return View::$root.'/'.$this->template.'.php';
	}
	
	public function __toString()
	{
		extract($this->data, EXTR_OVERWRITE);
		ob_start();
		require $this->filename();
		return ob_get_clean();
	}
}

class ViewException extends Exception {}

class ViewTemplateFileNotFoundException extends ViewException
{
	public function __construct($filename)
	{
		return parent::__construct(sprintf('View template file "%s" could not be found', $filename));
	}
}