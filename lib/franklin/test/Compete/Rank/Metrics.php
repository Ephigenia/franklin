<?php

namespace Franklin\test\Compete\Rank;

class Metrics extends \ArrayObject
{
	CONST RANK = 'rank';
	CONST VISITS = 'vis';
	CONST UNIQUE_VISITS = 'uv';
	
	public function __construct()
	{
		parent::__construct(array(
			self::RANK => self::RANK,
			self::VISITS => self::VISITS,
			self::UNIQUE_VISITS => self::UNIQUE_VISITS,
		));
	}
}