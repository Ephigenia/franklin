<?php

class_exists('View') or require __DIR__.'/View.php';

class Element extends View
{
	protected function filename()
	{
		return View::$root.'/element/'.$this->template.'.php';
	}
}