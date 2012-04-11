<?php

namespace Franklin\test\Battlefield3\Score;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

/**
 * @TODO Also a good candidate for using a generic JSON API test
 */
class Score extends Test
{
	public $name = 'Battlefield score';
	
	public $description = 'Score of a user on bf3stats.com';
	
	public function run()
	{
		$this->beforeRun();
		$CURL = new CURL();
		$source = $CURL->get('http://api.bf3stats.com/'.$this->config->platform.'/player/', array(
			'player' => $this->config->username,
		));
		if (!$source || !($json = json_decode($source, true))) {
			return null;
		}
		if (empty($json['stats'])) {
			return null;
		}
		switch(strtolower($this->config->metric)) {
			default:
				$avlue = 0;
				break;
			case 'skill':
			case 'elo':
				$value = $json['stats']['global']['elo'];
				break;
			case 'score':
				$value = $json['stats']['scores']['score'];
				break;
			case 'spm': 
				$value = $json['stats']['scores']['score'] / $json['stats']['global']['time'] * 60;
				break;
			case 'rounds':
				$value = $json['stats']['global']['rounds'];
				break;
			case 'finished-rounds': 
				$value = $json['stats']['global']['elo_games'];
				break;
			case 'wins': 
				$value = $json['stats']['global']['wins'];
				break;
			case 'losses': 
				$value = $json['stats']['global']['losses'];
				break;
			case 'wlratio':
				$value = $json['stats']['global']['losses'] / $json['stats']['global']['wins'];
				break;
			case 'kills': 
				$value = $json['stats']['global']['kills'];
				break;
			case 'deaths':
				$value = $json['stats']['global']['deaths'];
				break;
			case 'kdratio':
				$value = $json['stats']['global']['deaths'] / $json['stats']['global']['kills'];
				break;
			case 'headshots':
				$value = $json['stats']['global']['headshots'];
				break;
			case 'shots':
				$value = $json['stats']['global']['shots'];
				break;
			case 'hits':
				$value = $json['stats']['global']['hits'];
				break;
			case 'accuracy':
				$value = $json['stats']['global']['shots'] / $json['stats']['global']['hits'];
				break;
		}
		return (float) preg_replace('@[^0-9\.]+@', '', $value);
	}
}