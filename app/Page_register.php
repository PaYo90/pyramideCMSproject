<?php

namespace Aplikacja\Register;

class Page
{
	public static function upperContent($title)
	{

		require_once("includes/_head.php");

	}

	public static function lowerContent()
	{
		require_once("includes/_register_down.php");
	}
}