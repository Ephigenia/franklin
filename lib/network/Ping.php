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
 * 	@filesource		$HeadURL: https://ephigenia@franklin.svn.sourceforge.net/svnroot/franklin/trunc/lib/network/Ping.php $
 */

/**
 * Simple class that performs pings on a host
 * 
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 30.04.2009
 * @package Franklin
 * @subpackage Franklin.Network
 */
class Ping
{	
	public $host;
	
	public $timeout = 2000;
	
	public $port = 80;
	
	/**
	 * Ping response time in miliseconds
	 * 	@var integer
	 */
	public $ping;

	public function __construct($hostname, $timeout = null)
	{
		$this->hostname = parse_url($hostname, PHP_URL_HOST);
		if ($timeout !== null) {
			$this->timeout = $timeout;
		}
	}
	
	public function run()
	{
		$start = microtime(true);
		if ($socket = @fsockopen($this->hostname, $this->port, $erroNo, $errStr, $this->timeout)) {
			$this->ping = round(((microtime(true) - $start) * 1000));
			fclose($socket);
		} else {
			$this->ping = false;
		}	
		return $this->ping;
	}
	
} // END Ping class