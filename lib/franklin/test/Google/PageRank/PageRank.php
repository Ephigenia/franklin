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
		require FRANKLIN_ROOT.'/lib/GooglePageRankChecker/GooglePageRankChecker.php';
		return \GooglePageRankChecker::getRank($this->config->host);
	}
}