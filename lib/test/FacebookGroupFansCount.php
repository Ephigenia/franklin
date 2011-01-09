<?php

namespace Franklin\test;

/**
 * A {@link Test} that gets the number of fans of a facebook group.
 * The group must be public and viable via the open graph protocol api
 * 	
 * @package Franklin
 * @subpackage Franklin.Test
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 2010-06-16
 */
class FacebookGroupFansCount extends \Franklin\test\Scrape
{
	public $display = 'number';
	
	public function afterConstruct()
	{
		// id is okay too!
		$this->url = 'https://graph.facebook.com/'.urlencode($this->groupId); 
		$this->regexp = '@fan_count":\s(\d+)@i';
		return parent::afterConstruct();
	}
}