<?php

namespace Franklin\test\Spotify\ArtistPopularity;

use
    Franklin\test\Scrape\Scrape,
    Franklin\network\CURL
    ;

/**
 * The Artist Popularity Test for Spotify Artists takes an artist id and
 * then returns the popularity value of this artist if it can be found.
 *
 * https://developer.spotify.com/web-api/get-artist/
 */
class ArtistPopularity extends Scrape
{
    public $name = 'Spotify Artist Populartiy';

    public $description = 'Tracks the popularity of a specific spotify artist';

    public function run()
    {
        $this->beforeRun();

        $CURL = new CURL();
        $url = 'https://api.spotify.com/v1/artists/' . $this->config->id;

        // if anything happens during requests return a false
        // it could be that the artist’s id is wrong or the server is not
        // responding
        $result = $CURL->get($url);
        if (!$result) {
            return false;
        }

        // response does not contain valid json that can be transformed to array
        if (!$json = json_decode($result, true)) {
            return false;
        }

        // if an error occures return just false 
        if (isset($json['error'])) {
            return false;
        }

        // try to find the artists popularity
        if (!isset($json['popularity'])) {
            return false;
        }

        return $this->convertValue($json['popularity']);
    }
}