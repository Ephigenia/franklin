<?php

namespace Franklin\test\Battlefield3\Score;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

/**
 * @TODO improve this test using the api http://api.bf3stats.com/360/player/?player=ephBox
 */
class Score extends Test
{
	public $name = 'Battlefield score';
	
	public $description = 'Score of a user on bf3stats.com';
	
	public function run()
	{
		$this->beforeRun();
		$CURL = new CURL();
		$url = 'http://bf3stats.com/stats_'.$this->config->platform.'/'.$this->config->username;
		$source = $CURL->get($url);
		if ($source) {
			$DOMDocument = new \DOMDocument();
			@$DOMDocument->loadHTML($source);
			$DOMXPath = new \DOMXPath($DOMDocument);
			switch(strtolower($this->config->metric)) {
				case 'score':
					$nodes = $DOMXPath->query('//dd[@id="scores-score"]');
					break;
				case 'spm': 
					$nodes = $DOMXPath->query('//dd[@id="spm"]');
					break;
				case 'rounds': 
					$nodes = $DOMXPath->query('//dd[@id="global-rounds"]');
					break;
				case 'finished-rounds': 
					$nodes = $DOMXPath->query('//dd[@id="finishedrounds"]');
					break;
				case 'skill': 
					$nodes = $DOMXPath->query('//dd[@id="global-elo"]');
					break;
				case 'wins': 
					$nodes = $DOMXPath->query('//dd[@id="global-wins"]');
					break;
				case 'losses': 
					$nodes = $DOMXPath->query('//dd[@id="global-losses"]');
					break;
				case 'kills': 
					$nodes = $DOMXPath->query('//dd[@id="global-kills"]');
					break;
				case 'deaths':
					$nodes = $DOMXPath->query('//dd[@id="global-deaths"]');
					break;
				case 'headshots':
					$nodes = $DOMXPath->query('//dd[@id="global-headshots"]');
					break;
				case 'shots':
					$nodes = $DOMXPath->query('//dd[@id="global-shots"]');
					break;
				case 'hits':
					$nodes = $DOMXPath->query('//dd[@id="global-hits"]');
					break;
				case 'accuracy':
					$nodes = $DOMXPath->query('//dd[@id="global-hits"]');
					break;
			}
			
			if ($nodes->length > 0) {
				foreach($nodes as $node) {
					$score = $node->textContent;
					return (float) preg_replace('@[^0-9\.]+@', '', $score);
				}
			}
		}
		return 0;
	}
}