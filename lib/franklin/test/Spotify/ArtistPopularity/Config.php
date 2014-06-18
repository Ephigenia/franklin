<?php

namespace Franklin\test\Spotify\ArtistPopularity;

use
    Franklin\test\config\type\String,
    Franklin\test\config\type\Integer
    ;

class Config extends \Franklin\test\config\Config
{
    public function init()
    {
        $this->definition->append(
            new String('id', false, null, 'artist id on spotify')
        );
        return true;
    }
}