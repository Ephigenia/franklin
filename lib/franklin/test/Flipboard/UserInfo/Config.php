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
                return sprintf('https://flipboard.com/profile/%s',
                    urlencode($this->username)
                );
                break;
        }
        return parent::offsetGet($offset);
    }
}