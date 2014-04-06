<?php

namespace Franklin\test\PlayStore\ApplicationInfo;

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
            'userRatingCount',
            'averageUserRating',
        );
        $this->definition->append(
            new String('bundleIdentifier', true, null, 'The bundle identifier of the android application'),
            new String('country', true, 'de', 'Country code for the query'),
            new Enum('key', false, $options[0], 'Metric that should be recorded')
        );
        $this->definition->key->options = $options;
        return true;
    }

    public function offsetGet($offset)
    {
        switch($offset) {
            case 'url':
                return sprintf('https://play.google.com/store/apps/details?id=%s&hl=%s',
                    $this->bundleIdentifier,
                    $this->country
                );
                break;
            case 'regexp':
                switch($this->key) {
                    case 'userRatingCount':
                        return '/class=[\"\']reviews-num[\"\']>([\d.]+)</is';
                        break;
                    case 'averageUserRating':
                        return '/class=[\"\']score[\"\']>([\d,.]+)</is';
                        break;
                }
                break;
        }
        return parent::offsetGet($offset);
    }
}