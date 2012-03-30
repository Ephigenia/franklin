<?php

namespace Franklin\storage;

class FlatFile extends \SPLFileInfo implements Storage
{
	public function store(\DateTime $date, $value)
	{
		$file = $this->openFile('a+');
		$file->fwrite($date->format('c').';'.$value."\n");
		return $this;
	}
}