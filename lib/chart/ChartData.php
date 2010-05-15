<?php

/**
 * 	Franklin: <http://franklin.sourecforge.net>
 * 	Copyright 2009+, Ephigenia M. Eichner, Kopernikusstr. 8, 10245 Berlin
 *
 * 	Licensed under The MIT License
 * 	Redistributions of files must retain the above copyright notice.
 * 	@license		http://www.opensource.org/licenses/mit-license.php The MIT License
 * 	@copyright	copyright 2007+, Ephigenia M. Eichner
 * 	@link			http://code.ephigenia.de/projects/franklin/
 * 	@version		$Rev: 6 $
 * 	@modifiedby		$LastChangedBy: ephigenia $
 * 	@lastmodified	$Date: 2009-10-17 15:42:57 +0200 (Sat, 17 Oct 2009) $
 * 	@filesource		$HeadURL: https://ephigenia@franklin.svn.sourceforge.net/svnroot/franklin/trunc/lib/chart/ChartData.php $
 */

/**
 * Chart-Data class used by {@link Chart}
 *
 * @package Franklin
 * @subpackage Franklin.Chart
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 19.05.2009
 */
class ChartData implements Countable, Iterator, ArrayAccess {
	public $data = array();
	public $max = 0;
	public $min = 0;
	public $count = 0;
	public function __construct($data) {
		if (is_scalar($data)) {
			if (is_string($data)) {
				$data = explode(',', $data);
			} else {
				$data = array((float) $data);
			}
		}
		if (!is_array($data)) {
			throw new ChartDataInvalidTypeException();
		}
		$this->data = array_map('floatval', $data);
		$this->count = count($this->data);
		if (count($this) > 0) {
			$this->max = max($this->data);
			$this->min = min($this->data);
		}
		return $this;
	}
	public function offsetNameForIndex($index) {
		$key = array_keys($this->data);
		if (isset($key[$index])) {
			return $key[$index];
		} else {
			return false;
		}
	}
	
	public function count()
	{
		return $this->count;
	}
	
	public function key()
	{
		return key($this->data);
	}
	
	public function current()
	{
		return current($this->data);
	}
	
	public function next()
	{
		return next($this->data);
	}
	
	public function rewind()
	{
		return reset($this->data);
	}
	
	public function valid()
	{
		return FALSE !== $this->current();
	}
	
	public function offsetExists($offset)
	{
		return isset($this->data[$offset]);
	}
	
	public function offsetGet($offset)
	{
		return $this->data[$offset];
	}
	
	public function offsetSet($offset, $value)
	{
		$this->data[$offset] = $value;
	}
	
	public function offsetUnset($offset)
	{
		unset($this->data[$offset]);
	}
	
} // END ChartData class
 
/**
 * @package Franklin
 * @subpackage Franklin.Chart
 */
class ChartDataException extends Exception {}

/**
 * @package Franklin
 * @subpackage Franklin.Chart
 */
class ChartDataInvalidTypeException extends ChartDataException {}