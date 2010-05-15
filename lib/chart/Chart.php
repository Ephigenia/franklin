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
 * 	@filesource		$HeadURL: https://ephigenia@franklin.svn.sourceforge.net/svnroot/franklin/trunc/lib/chart/Chart.php $
 */

class_exists('Image') or require dirname(__FILE__).'/../Image.php';
class_exists('ChartData') or require dirname(__FILE__).'/ChartData.php';

/**
 * A basic Chart class
 *
 * @package Franklin
 * @subpackage Franklin.Chart
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 19.05.2009
 */
class Chart extends Image
{
	public $title = false;
	public $titleColor = '4D4D4D';
	public $titleFontSize = 2;
	protected $padding = array(10,10,10,10); // left, top, right, bottom
	protected $renderParts = array('Title', 'AxisY', 'AxisX', 'Data', 'Points');
	public $dataColor = 'FF7000';
	public $dataTextColor = '000000';
	public $axisXColor = '3B7B95';
	public $axisYColor = '3B7B95';
	public $axisY2Color = '2B6B84';
	public $axisFontSize = 1;
	public $drawDataValues = true;
	public $backgroundColor = '050505';
	public $pointColor = 'ffff00';
	public $pointFillColor = 'ffffff';
	public $pointType = 'cross';
	
	public function __construct($width, $height, Array $data = array()) {
		$this->data = new ChartData($data);
		return parent::__construct($width, $height);
	}
	
	protected function drawData() {
		return true;
	}
	
	public function render() {
		$start = microtime(true);
		foreach($this->renderParts as $partName) {
			if (!method_exists($this, 'draw'.$partName)) continue;
			$this->{'draw'.$partName}();
		}
		return parent::render();
	}
	
	public function drawTitle() {
		if (empty($this->title)) return false;
		$this->padding[1] += 10;
		if (function_exists('mb_convert_encoding')) {
			$this->title = mb_convert_encoding($this->title, 'ISO-8859-1','UTF-8');
		}
		$x = $this->width / 2 - imagefontwidth($this->titleFontSize) * strlen($this->title) / 2;
		$this->text($x, 0, $this->title, $this->titleFontSize, $this->titleColor);
		return true;
	}
	
	protected function drawPoints() {
		$rootX = $this->padding[0];
		$rootY = $this->padding[1];
		$width = $this->width - $this->padding[0] - $this->padding[2];
		$height = $this->height - $this->padding[1] - $this->padding[3];
		$i = 0;
		foreach($this->data as $k => $v) {
			$x = $rootX + ($width / ($this->data->count-1) * $i);
			if ($this->data->max == 0) {
				$percent = 1;
			} else {
				$percent = $v / $this->data->max;
			}
			$y = $rootY + $height - ($height * $percent);
			if ($this->pointType == 'cross') {
				$this->line($x-1,$y-1, $x+1, $y+1, $this->pointColor, false);
				$this->line($x+1,$y-1, $x-1, $y+1, $this->pointColor, false);
			} else {
				$this->circle($x, $y, 4, $this->pointColor, $this->pointFillColor, true);
			}	
			$i++;
		}	
	}
	
	protected function drawAxisY() {
		$fontHeight = imagefontheight($this->axisFontSize);
		// detect maximum label size that is needed
		$labelMaxLength = max(strlen($this->data->min), strlen($this->data->max));
		// add maximum label size as padding to the left
		$this->padding[0] += $labelMaxLength * 5;
		// draw Y-Axis Data Points
		$axisLength = $this->height - $this->padding[3] - $this->padding[1];
		if (in_array('AxisX', $this->renderParts)) {
			$axisLength -= $fontHeight;
		}
		$subPoints = ceil($axisLength / $fontHeight) / 3;
		$subPointLength = $axisLength / $subPoints;
		for($i = 0; $i <= $subPoints; $i++) {
			$y = (($i) * $subPointLength) + $this->padding[1];
			$v = round($this->data->max * (($subPoints - $i) / $subPoints));
			$this->text(4, $y - ($fontHeight / 2), str_pad($v, $labelMaxLength, ' ', STR_PAD_LEFT), $this->axisFontSize, $this->axisXColor);
			$this->line($this->padding[0] - 4, $y, $this->padding[0], $y, $this->axisXColor);
		}
		
		// draw line
		$x = $this->padding[0];
		$this->line($x, $this->padding[1], $x, $this->padding[1] + $axisLength, $this->axisXColor);
	}
	
	protected function drawAxisX() {
		$fontHeight = imagefontheight($this->axisFontSize);
		$fontWidth = imagefontwidth($this->axisFontSize);
		// change padding for x-axis drawing
		$this->padding[3] += $fontHeight + 2;
		// determine coords for axis drawing
		$axisLength = $this->width - $this->padding[0] - $this->padding[2];
		$axisStartX = $this->padding[0];
		$axisStartY = $this->height - $this->padding[3];
		// axis line
		$this->line($axisStartX, $axisStartY, $axisStartX + $axisLength, $axisStartY, $this->axisYColor);
		// axis points
		$dataPointsNumber = 3;
		if ($dataPointsNumber > $this->data->count) {
			$dataPointsNumber = $this->data->count;
		}
		if ($this->data->count > 0) {
			$dataPointsWidth = floor($axisLength / $dataPointsNumber);
		} else {
			$dataPointsWidth = $axisLength;
		}
		// keys
		for ($i = 0; $i <= $dataPointsNumber; $i++) {
			$x = $axisStartX;
			$labelPosition = 0;
			if ($i > 0) {
				$labelPosition = floor(($this->data->count) * $i / $dataPointsNumber) - 1; 
				$x += ($axisLength * $i / $dataPointsNumber);
			}
			//$this->line($x, $axisStartY, $x, $axisStartY + 2, $this->axisYColor);
			if ($i > 0) {
				$this->line($x, $this->padding[1], $x, $axisStartY + 2, $this->axisYColor, true, 1, true);
			}
			// text label
			$label = $this->data->offsetNameForIndex($labelPosition);
			$label = date('d.m H:i', $label);
			// centered labels except of first and last
			if ($i == $dataPointsNumber) {
				$x -= ($fontWidth * strlen($label));
			} elseif ($i > 0) {
				$x -= ($fontWidth * strlen($label)) / 2;
			} elseif ($i == 0) {
				$x = 2;
			}
			//$label = $labelPosition;
			$this->text($x, $axisStartY + 2, $label, $this->axisFontSize, $this->axisYColor);
		}
	}
	
} // END Chart class