<?php

namespace Franklin\test\Itunes\ApplicationInfo;

use
    Franklin\test\config\type\Enum,
    Franklin\test\config\type\String
    ;

class Config extends \Franklin\test\config\Config
{    
    public function init()
    {
        // add key options definition to config
        $options = array(
            'price',
            'averageUserRating',
            'averageUserRatingForCurrentVersion',
            'userRatingCount',
            'userRatingCountForCurrentVersion',
        );
        $this->definition->append(
            new String('id', true, null, 'The applications trackId in the appstore or a search term'),
            new String('country', true, 'de', 'Country code for the query, otherwise only "price" will be available'),
            new Enum('key', false, $options[0], 'Metric that should be recorded')
        );
        $this->definition->key->options = $options;
        return true;
    }
}