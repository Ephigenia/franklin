<?php

namespace Franklin\storage;

class CSV extends \SPLFileInfo implements Storage
{
	protected $seperator = ';';
	
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
		$lastNLines = $this->getLastNLines($limit);
		if (empty($lastNLines)) {
			return false;
		}
		$values = array();
		foreach($lastNLines as $data) {
			$values[] = array(
				new \DateTime($data[0]),
				(float) $data[1]
			);
		}
		return $values;
	}
	
	protected function getLastNLines($count)
	{
		if (!$this->isReadable()) {
			return false;
		}
		$lines = array();
		$file = $this->openFile('r');
		$file->setFlags(\SplFileObject::READ_CSV | \SplFileObject::SKIP_EMPTY | \SplFileObject::DROP_NEW_LINE);
		$file->setCsvControl($this->seperator);
		foreach($file as $data) {
			if (!$data) {
				continue;
			}
			array_push($lines, $data);
			if (count($lines) > $count) {
				array_shift($lines);
			}
		}
		return $lines;
	}
}