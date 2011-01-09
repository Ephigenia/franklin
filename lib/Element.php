<?php

class_exists('View') or require __DIR__.'/View.php';

class Element extends View
{
	protected function filename()
	{
		return Franklin_View::$root.'/element/'.$this->template.'.php';
	}
}