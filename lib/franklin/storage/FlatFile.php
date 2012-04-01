<?php

namespace Franklin\storage;

class FlatFile extends \SPLFileInfo implements Storage
{
	public function store(\DateTime $date, $value)
	{
		$value = (float) $value;
		$file = $this->openFile('a+');
		$file->fwrite($date->format('c').';'.$value."\n");
		return $this;
	}
	
	/**
	 *  return the last $limit values that are stored
	 */
	public function getLatestValues($limit = 30)
	{
		$file = $this->openFile('a+');
		$data = array();
		var_dump(count($this));
		return $data;
	}
}