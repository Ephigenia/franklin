<?php

namespace Franklin\test\Wordpress\Plugin;

use
    Franklin\test\config\type\Enum,
    Franklin\test\config\type\String
    ;

class Config extends \Franklin\test\config\Config
{
    public function init()
    {
        $options = [
            'total_downloads',
            'downloads_yesterday',
            'num_ratings',
            'rating',
        ];
        $this->definition->append(
            new String('slug', true, null, 'plugin slug name'),
            new Enum('key', false, $options[0], 'Metric that should be recorded ('.implode(', ', $options).')')
        );
        $this->definition->key->options = $options;
        return true;
    }
}

