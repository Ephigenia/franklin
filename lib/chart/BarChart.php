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
 * 	@filesource		$HeadURL: https://ephigenia@franklin.svn.sourceforge.net/svnroot/franklin/trunc/lib/chart/BarChart.php $
 */

class_exists('Chart') or require dirname(__FILE__).'/Chart.php';

/**
 * A basic Bar-Chart class
 *
 * @package Franklin
 * @subpackage Franklin.Chart
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 19.05.2009
 */
class BarChart extends Chart
{
	
	protected $renderParts = array(
		'Title',
		'AxisY',
		'AxisX',
		'Data',
	);

	protected function drawData()
	{
		// canvas
		$canvasX = $this->padding[0];
		$canvasY = $this->padding[1];
		$canvasWidth = $this->width - $this->padding[0] - $this->padding[2];
		$canvasHeight = $this->height - $this->padding[1] - $this->padding[3];
		// calculate bar width
		$dataPointWidth = $canvasWidth / ($this->data->count);
		$barPadding = 1;
		$i = 0;
		
		foreach($this->data as $index => $value) {
			$x = $canvasX + $dataPointWidth * $i;
			if ($this->data->max == 0) {
				$y = $canvasY + $canvasHeight - $canvasHeight * 0;
			} else {
				$y = $canvasY + $canvasHeight - ($canvasHeight * $value / $this->data->max);
			}
			$this->rect($x + $barPadding, $canvasHeight + $canvasY, $x + $dataPointWidth - $barPadding, $y, null, $this->dataColor, IMG_COLOR_TILED);
			// centered data point value
			if ($this->drawDataValues) {
				$x += $dataPointWidth / 2 - (strlen($value) / 2) * 5;
				$this->text($x, $y - 10, $value, 1, $this->dataTextColor);
			}
			$i++;
		}
		return true;
	}
	
} // END BarChar class