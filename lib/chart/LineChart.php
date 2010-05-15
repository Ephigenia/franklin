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
 * 	@filesource		$HeadURL: https://ephigenia@franklin.svn.sourceforge.net/svnroot/franklin/trunc/lib/chart/LineChart.php $
 */

class_exists('Chart') or require dirname(__FILE__).'/Chart.php';

/**
 * Basic Line-Chart
 *
 * @package Franklin
 * @subpackage Franklin.Chart
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 19.05.2009
 */
class LineChart extends Chart
{	
	protected $lineThickness = 2;
	
	protected function drawData()
	{
		$count = $this->data->count - 1;
		if ($count < 1) {
			$count = 1;
		}
		$pixelsPerDataPoint = ($this->width - ($this->padding[0] + $this->padding[2])) / ($count);
		
		$lx = $ly = $i = 0;
		$lineCanvasHeight = $this->height - $this->padding[1] - $this->padding[3];
		
		foreach($this->data as $index => $value) {
			$x = $pixelsPerDataPoint * $i + $this->padding[0];
			if ($this->data->max != 0) {
				$y = $lineCanvasHeight - ($value / $this->data->max * $lineCanvasHeight) + $this->padding[1];
			} else {
				$y = $lineCanvasHeight - (1 * $lineCanvasHeight) + $this->padding[1];
			}
			
			if ($i > 0) {
				$this->line($lx, $ly, $x, $y, $this->dataColor, true, $this->lineThickness);
			}
			
			$lx = $x;
			$ly = $y;
			$i++;
		}
		
		return true;
	}
	
} // END LineChart class