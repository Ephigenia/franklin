<?php

namespace Franklin\test\Flipboard\UserInfo;

use
    Franklin\test\Scrape\Scrape
    ;

class UserInfo extends Scrape
{
    public $name = 'Flipboard User Information';
    
    public $description = 'Tracks informations about a single flipboard user.';

    public function processResponse($response)
    {
        $regexp = '/class=[\"\']metric-value[\"\']>([\d,.]+)<\/div>/i';
        if (!preg_match_all($regexp, $response, $matches)) {
            return false;
        }
        switch($this->config->key) {
            case 'articles':
                $value = $matches[1][0];
                break;
            case 'followers':
                $value = $matches[1][2];
                break;
            case 'magazines':
                $value = $matches[1][1];
                break;
        }
        return $this->convertValue($value);
    }

    public function convertValue($value) {
        return (int) str_replace(',', '', $value);
    }
}