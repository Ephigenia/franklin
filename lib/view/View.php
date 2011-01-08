<?php

/**
 * Franklin: <http://code.marceleichner.de/project/franklin>
 * Copyright 2007+, Ephigenia M. Eichner, Kopernikusstr. 8, 10245 Berlin
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 * @license		http://www.opensource.org/licenses/mit-license.php The MIT License
 * @copyright	copyright 2007+, Ephigenia M. Eichner
 * @link		http://code.ephigenia.de/projects/franklin/
 */

/**
 * @package Franklin
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 19.05.2009
 */
class View
{
	protected $data = array();
	
	protected $filename;
	
	public function __construct($filename, Array $data = array())
	{
		$this->filename($filename);
		$this->data = $data;
		return $this;
	}
	
	protected function exists()
	{
		return is_file($this->filename);
	}
	
	public function filename($filename)
	{
		$this->filename = sprintf(realpath(__DIR__.'/../view/').'/%s.php', $filename);
		if (!$this->exists()) {
			throw new ViewFileNotFoundException($this->filename);
		}
	}
	
	protected function element($name, Array $data = array())
	{
		class_exists('Element') or require __DIR__.'/Element.php';
		return new Element($name, array_merge_recursive($this->data, $data));
	}
	
	/**
	 * Renders the view by using the $data variables in it and returns the result
	 * 	@return string
	 */
	public function __toString()
	{
		foreach($this->data as $key => $value) {
			${$key} = $value;
		}
		ob_start();
		require $this->filename;
		return ob_get_clean();
	}
}

/**
 * @package Franklin
 * @subpackage Exceptions
 */
class ViewException extends Exception {}

/**
 * @package Franklin
 * @subpackage Exceptions
 */
class ViewFileNotFoundException extends Exception
{
	public function __construct($filename)
	{
		return parent::__construct(sprintf('View file "%s" could not be found', $filename));
	}
}