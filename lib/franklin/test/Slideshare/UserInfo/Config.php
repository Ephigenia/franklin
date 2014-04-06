<?php

namespace Franklin\test\Slideshare\UserInfo;

use
    Franklin\test\config\type\Enum,
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
        $options = [
            'followers',
            'slides',
        ];
		$this->definition->append(
			new String('username', true, null, 'slideshare username'),
            new Enum('key', false, $options[0], 'Metric that should be recorded')
		);
        $this->definition->key->options = $options;
		return true;
	}
}