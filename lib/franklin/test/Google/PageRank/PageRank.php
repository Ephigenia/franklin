<?php

namespace Franklin\test\Google\PageRank;

use
	Franklin\test\Test
	;

class PageRank extends Test
{
	public $name = 'Google Pagerank';
	
	public $description = 'Google’s famous rank for websites';

	public function run()
	{
		$this->beforeRun();
		if (!class_exists('\GooglePageRankChecker')) {
			require FRANKLIN_ROOT.'/lib/GooglePageRankChecker/GooglePageRankChecker.php';
		}
		$result = \GooglePageRankChecker::getRank($this->config->host);
		if (is_int($result)) {
			return $result;
		}
		return false;
	}


}