<?php

namespace Franklin\test\Feedburner\Metric;

class Types extends \ArrayObject
{
	CONST READERS = 'circulation';
	CONST HITS = 'hits';
	
	public function __construct()
	{
		parent::__construct(array(
			self::READERS => self::READERS,
			self::HITS => self::HITS,
		));
	}
}