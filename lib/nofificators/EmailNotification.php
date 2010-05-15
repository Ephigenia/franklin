<?php

/**
 * 	Franklin: <http://franklin.sourecforge.net>
 * 	Copyright 2009+, Ephigenia M. Eichner, Kopernikusstr. 8, 10245 Berlin
 *
 * 	Licensed under The MIT License
 * 	Redistributions of files must retain the above copyright notice.
 * 	@license		http://www.opensource.org/licenses/mit-license.php The MIT License
 * 	@copyright	copyright 2007+, Ephigenia M. Eichner
 * 	@link			http://code.ephigenia.de/projects/franklin/
 * 	@version		$Rev: 6 $
 * 	@modifiedby		$LastChangedBy: ephigenia $
 * 	@lastmodified	$Date: 2009-10-17 15:42:57 +0200 (Sat, 17 Oct 2009) $
 * 	@filesource		$HeadURL: https://ephigenia@franklin.svn.sourceforge.net/svnroot/franklin/trunc/lib/nofificators/EmailNotification.php $
 */

require_once dirname(__FILE__).'/Notification.php';

class EmailNotification extends Notification
{
	
	public function send() {
		$emailContent = new View(APPROOT.'txt/notifyEmail', array(
			'Project' => $this->project,
			'Test' => $this->test
		));
		return @mail(NOTIFY_EMAIL_RECIPIENT, APPNAME.' Test failed '.$this->project->name, $emailContent->render());
	}

} // END EmailNotification class