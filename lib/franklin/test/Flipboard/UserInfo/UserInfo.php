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
        // the response is a json response which was designed to work well 
        // with the react framework which flipboard uses since Feb. 2014
        // the metrics have a own section in the json response
        $json = json_decode($response, true);

        if (!$json) {
            return false;
        }
        
        // the json cotains arrays with differnt data, we need the one with
        // the user meta data whcih has the "authorUsername" as key which
        // matches the username from the config
        foreach($json as $sectionData) {
            if (!isset($sectionData['authorUsername'])) {
                continue;
            }
            if ($sectionData['authorUsername'] == $this->config->username) {
                $userMetaData = $sectionData;
            }
        }
        if (!isset($userMetaData)) {
            return false;
        }

        $metrics = $userMetaData['groups'][0]['metrics'];
        $searchedKey = $this->config->key;
        if ($searchedKey == 'magazines') {
            $searchedKey = 'magazineCount';
        }
        if ($searchedKey == 'followers') {
            $searchedKey = 'follower';
        }
        foreach($metrics as $metricsSection) {
            if ($metricsSection['type'] == $searchedKey) {
                return $this->convertValue($metricsSection['raw']);
            }
        }

        return false;
    }
}