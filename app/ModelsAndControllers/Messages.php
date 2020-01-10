<?php

namespace Aplikacja;

class Messages
{
	public static function setError($message)
	{
		$_SESSION['messages']['error'] = $message;
	}
	
	public static function setSuccess($message)
	{
		$_SESSION['messages']['success'] = $message;
	}
	
	public static function flashMessages()
	{
				if (isset($_SESSION['messages']['error']))
		{
			echo '
			<div class="alert alert-danger text-danger" role="alert">
            <strong>&times;</strong> '.$_SESSION['messages']['error'].'
            </div>
			';
					unset($_SESSION['messages']['error']);
		}
		
				if (isset($_SESSION['messages']['success']))
		{
			echo '
			<div class="alert alert-success text-success" role="alert">
            <strong>&times;</strong> '.$_SESSION['messages']['success'].'
            </div>
			';
					unset($_SESSION['messages']['success']);
		}
	}
}
?>