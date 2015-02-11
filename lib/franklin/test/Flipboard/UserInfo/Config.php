<?php

namespace Franklin\test\Flipboard\UserInfo;

use
    Franklin\test\config\type\Enum,
    Franklin\test\config\type\String
    ;

class Config extends \Franklin\test\config\Config
{    
    public function init()
    {
        $keyOptions = array(
            'followers',
            'articles',
            'magazines',
        );
        $this->definition->append(
            new String('username', true, null, 'the username of which the numbers should get aquired'),
            new Enum('key', false, $keyOptions[0], 'Metric that should be recorded ('.implode(', ', $keyOptions).')')
        );
        $this->definition->key->options = $keyOptions;
        return true;
    }

    public function offsetGet($offset)
    {
        switch($offset) {
            case 'url':
                return 'https://flipboard.com/api/users/updateFeed?limit=0&sections=flipboard%2Fusername%252F'.urlencode($this->username).'&wantsMetadata=true';
                break;
        }
        return parent::offsetGet($offset);
    }
}