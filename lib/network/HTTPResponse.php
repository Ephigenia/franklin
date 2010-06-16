<?php

/**
 * Franklin: <http://code.marceleichner.de/project/franklin>
 * Copyright 2009+, Ephigenia M. Eichner, Kopernikusstr. 8, 10245 Berlin
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 * @license		http://www.opensource.org/licenses/mit-license.php The MIT License
 * @copyright	copyright 2007+, Ephigenia M. Eichner
 * @link			http://code.ephigenia.de/projects/franklin/
 * @filesource
 */

/**
 * 	@subpackage Frankin.Network
 * 	@package Franklin
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 19.05.2009
 */
class HTTPResponse
{
	public $raw;
	
	public $header;
	
	public $status;
	
	public $content;
	
	protected $headerRegexp = '/^([-_\w]+):\s*(.+)$/m';
	
	public function __construct($raw)
	{
		$this->raw = $raw;
		$this->parse($raw);
	}	
	
	public function parse($rawData)
	{
		// extract status code from message
		if (preg_match('@^HTTP(\/1(\.[10])?)?\s(\d+)@', $rawData, $found)) {
			$this->status = (int) $found[3];
		}
		// split response headers and message
		if ($found = preg_split('/[\n\r]{4,}/im', $rawData)) {
			if (count($found) < 2) return true;
			$found = array_map('trim', $found);
			$rawHeader = $found[0];
			$rawContent = $found[1];
			// parse headers
			foreach(preg_split('@\n+@i', $rawHeader) as $headerLine) {
				if (!preg_match($this->headerRegexp, $headerLine, $found)) continue;
				$this->header[$found[1]] = trim($found[2]);
			}
			// parse content
			$this->content = $rawContent;
		}
		return true;
	}
	
} // END HTTPResponse class