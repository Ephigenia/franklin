<?php

namespace Franklin\storage;

interface Storage 
{
	public function store(\DateTime $date, $value);
}