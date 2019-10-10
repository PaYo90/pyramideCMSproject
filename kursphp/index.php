<?php
require('config.php');

session_start();

use Wesel\Shortener;

$processor = new \Wesel\Shortener\RequestProcessor();

switch($_SERVER['HTTP_HOST'])
{
	case ROOT_LANDING_URL:
		$processor->processLandingRequest($_SERVER['REQUEST_URI']);
		break;
	case ROOT_APP_URL:
		$processor->processAppRequest($_SERVER['REQUEST_URI']);
		break;
	case ROOT_SHORT_URL:
		$processor->processShortRequest($_SERVER['REQUEST_URI']);
		break;
	default:
		header("Location:https://" . ROOT_LANDING_URL);
		break;
}