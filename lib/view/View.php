<?php

namespace Franklin\view;

class View
{
	public static $root = 'view';
	
	protected $template;
	
	protected $data = array();
	
	public function __construct($filename, Array $data)
	{
		$this->template = $filename;
		$this->data = $data + $this->data;
	}
	
	public function element($name, Array $data = array())
	{
		return new \Franklin\view\Element($name, $data +  $this->data);
	}
	
	protected function filename()
	{
		return View::$root.'/'.$this->template.'.php';
	}
	
	public function render()
	{
		if (!is_file($this->filename())) {
			throw new ViewTemplateFileNotFoundException($this->filename());
		}
		extract($this->data, EXTR_OVERWRITE);
		ob_start();
		require $this->filename();
		return ob_get_clean();
	}
	
	public function __toString()
	{
		return $this->render();
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