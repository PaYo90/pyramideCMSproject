<?php

namespace Aplikacja;

	/****************************************************************/
	/*/															   /*/
	/*/															   /*/
	/*/						ADMIN	PANEL						   /*/
	/*/															   /*/
	/*/															   /*/
	/****************************************************************/

class GetUsers
{
	public function __construct()
	{
		if (empty($_SESSION['user']) || !$_SESSION['user']->isAdmin()){
			Messages::setError("Błąd autoryzacji");
			header("Location:http://".ROOT_APP_URL."/loginForm");
		}
	}
	
	public function getUsers()
	{
		$db = new DB();
		$db -> query("SELECT * FROM users");
		$wyniki = $db -> execute();
		
		return $wyniki;
	}


}