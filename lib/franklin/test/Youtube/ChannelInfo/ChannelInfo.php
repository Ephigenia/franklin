<?php

namespace Franklin\test\Youtube\ChannelInfo;

use
    Franklin\test\Scrape\Scrape,
    Franklin\network\CURL
    ;

class ChannelInfo extends Scrape
{
    public $name = 'Youtube Channel Information';
    
    public $description = 'Information about a specific youtube user / channel';
    
    public function run()
    {
        $this->beforeRun();

        $url = sprintf('https://www.youtube.com/user/%s/about', $this->config->username);
        $CURL = new CURL();
        $response = $CURL->get($url);
        if ($result = $this->processResponse($response)) {
            $result = $this->convertValue($result);
        }
        return $result;
    }

    public function processResponse($response)
    {
        if (!$response) {
            return false;
        }

        $regexps = array(
            'followers' => '/([\d\.\,]+)<\/b> (Abonnenten|subscribers)/',
            'views' => '/([\d\.\,]+)<\/b> (Aufrufe|views)/',
        );

        // invalid key that should be found
        if (!isset($regexps[$this->config->key])) {
            return false;
        }

        if (preg_match_all($regexps[$this->config->key], $response, $found)) {
            return $found[1][0];
        }

        return false;
    }
}