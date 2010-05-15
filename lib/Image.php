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
 * 	@filesource		$HeadURL: https://ephigenia@franklin.svn.sourceforge.net/svnroot/franklin/trunc/lib/Image.php $
 */

class_exists('Object') or require dirname(__FILE__).'/Object.php';

/**
 * 	Simple Image Class
 * 	
 * @package Franklin
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 19.05.2009
 */
class Image extends Object
{
	protected $width;
	
	protected $height;
	
	protected $h;
	
	public $backgroundColor = 'ffffff';
	
	public function __construct($width, $height, $backgroundColor = null)
	{
		$this->width = abs((int)$width);
		$this->height = abs((int)$height);
		if (!is_null($backgroundColor)) {
			$this->backgroundColor = $backgroundColor;
		}
		$this->rect(0, 0, $this->width, $this->height, null, $this->backgroundColor);
		return $this;
	}
	
	public function h()
	{
		if (empty($this->h)) {
			$this->h = imagecreatetruecolor($this->width, $this->height);
		}
		return $this->h;
	}
	
	public function line($x1, $y1, $x2, $y2, $color, $antialias = true, $thickness = 1, $dashed = false)
	{
		if ($thickness > 1) {
			imagesetthickness($this->h(), $thickness);
		}
		if (function_exists('imageantialias')) {
			imageantialias($this->h(), $antialias);
		}
		if ($dashed) {
			imagedashedline($this->h(), $x1, $y1, $x2, $y2, $this->color($color));
		} else {
			imageline($this->h(), $x1, $y1, $x2, $y2, $this->color($color));
		}
		return $this;
	}
	
	public function circle($x, $y, $d, $color, $backgroundColor = false)
	{
		if ($backgroundColor) {
			imagefilledellipse($this->h(), $x, $y, $d, $d, $this->color($backgroundColor));
		}
		imageellipse($this->h(), $x, $y, $d, $d, $this->color($color));
		return $this;
	}
	
	public function rect($x1, $y1, $x2, $y2, $borderColor = false, $backgroundColor = false)
	{
		if ($backgroundColor) {
			imagefilledrectangle($this->h(), $x1, $y1, $x2, $y2, $this->color($backgroundColor));
		}
		if ($borderColor) {
			imagerectangle($this->h(), $x1, $y1, $x2, $y2, $this->color($borderColor));
		}
		return $this;
	}
	
	public function color($color)
	{
		if (func_num_args() == 3) {
			$color = func_get_args();
		}
		if (is_string($color)) {
			$rgb = hexdec($color);
			$r = ($rgb >> 16) & 0xFF;
			$g = ($rgb >> 8) & 0xFF;
			$b = $rgb & 0xFF;
		} elseif (is_array($color)) {
			list($r, $g, $b) = $color;
		}
		if (isset($r)) {
			return imagecolorallocate($this->h(), $r, $g, $b);
		} else {
			return $color;
		}
	}
	
	public function text($x, $y, $string, $size = 2, $color = false)
	{
		imagestring($this->h(), $size, $x, $y, $string, $this->color($color));
		return $this;
	}
	
	public function render()
	{
		imagepng($this->h);
	}
	
} // END Image Class