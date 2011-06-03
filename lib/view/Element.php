<?php

namespace Franklin/view;

class Element extends View
{
	protected function filename()
	{
		return self::$baseDir.'element'.DIRECTORY_SEPARATOR.$this->filename.'.'.$this->extension;
	}
}