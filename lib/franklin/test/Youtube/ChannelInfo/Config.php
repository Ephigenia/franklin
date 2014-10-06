<?php

namespace Franklin\test\Youtube\ChannelInfo;

use
    Franklin\test\config\type\String
    ;

class Config extends \Franklin\test\config\Config
{
    public function init()
    {
        $this->definition->append(
            new String('username', true, null, 'video id'),
            new String('key', true, 'followers', 'what to track: followers, views')
        );
        return true;
    }
}