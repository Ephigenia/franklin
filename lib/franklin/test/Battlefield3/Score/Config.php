<?php

namespace Franklin\test\Battlefield3\Score;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('platform', true, '360', 'plattform of the user [360, pc, ps3]'),
			new String('username', true, null, 'username'),
			new String('metric', true, 'score', 'metric to store [score, spm, rounds, wins, losses, skill, kills, deaths, headshots, accuracy]')
		);
		return true;
	}
}