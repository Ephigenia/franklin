<?php



$this->url = 'http://www.twitter.com/'.urlencode($this->username); 
$this->regexp = '@id="follower_count" class="stats_count numeric">([\d+.,]+)\s*</span>@i';