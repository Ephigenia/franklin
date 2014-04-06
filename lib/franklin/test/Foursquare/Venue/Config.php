<?php

namespace Franklin\test\Foursquare\Venue;

use
    Franklin\test\config\type\Enum,
    Franklin\test\config\type\String
    ;

class Config extends \Franklin\test\config\Config
{
    public function init()
    {
        $options = [
            'checkins',
            'people',
        ];
        $this->definition->append(
            new String('venue', true, null, 'foursquare venue identifier'),
            new Enum('key', false, $options[0], 'Metric that should be recorded')
        );
        $this->definition->key->options = $options;
        return true;
    }
}