<?php

/**
 * Franklin: <http://code.marceleichner.de/project/franklin>
 * Copyright 2009+, Ephigenia M. Eichner, Kopernikusstr. 8, 10245 Berlin
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 * @license		http://www.opensource.org/licenses/mit-license.php The MIT License
 * @copyright	copyright 2007+, Ephigenia M. Eichner
 * @link			http://code.ephigenia.de/projects/franklin/
 * @filesource
 */

class_exists('Object') or require dirname(__FILE__).'/Object.php';

/**
 * @package Franklin
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 19.05.2009
 */
class View extends Object
{	
	/**
	 * Filename
	 * 	@var string
	 */
	protected $name;
	
	/**
	 * view data
	 * 	@var array(string)
	 */
	protected $data = array();
	
	protected $filename; 
	
	public function __construct($name, Array $data = array())
	{
		$this->filename = $this->detectViewDir().$name.'.php';
		if (!file_exists($this->filename) || !is_file($this->filename)) {
			throw new ViewFileNotFoundException($this->filename);
		}
		$this->data = $data;
		return $this;
	}
	
	protected function detectViewDir()
	{
		return realpath(dirname(__FILE__).'/../view/').'/';
	}
	
	public function element($elementName, Array $data = array())
	{
		class_exists('Element') or require dirname(__FILE__).'/Element.php';
		$subView = new Element($elementName, array_merge($this->data, $data));
		return $subView->render();
	}
	
	/**
	 * Renders the view by using the $data variables in it and returns the result
	 * 	@return string
	 */
	public function render()
	{
		foreach($this->data as $key => $value) {
			${$key} = $value;
		}
		ob_start();
		require $this->filename;
		return ob_get_clean();
	}
}

class ViewException extends BasicException {}
class ViewFileNotFoundException extends ViewException {}