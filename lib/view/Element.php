<?php

namespace Franklin\View;

class Element extends View
{
	protected function filename()
	{
		return View::$root.'/element/'.$this->template.'.php';
	}
}