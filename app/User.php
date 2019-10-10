<?php

namespace Aplikacja;

class User
{
	public $id;
	public $email;
	public $username;
	public $imie;
	public $nazwisko;
	public $roleid;
	
	public function __construct($id, $email, $username, $imie, $nazwisko, $roleid)
	{
		$this->id = $id;
		$this->email = $email;
		$this->username = $username;
		
		$this->imie = $imie;
		$this->nazwisko = $nazwisko;
		$this->roleid = $roleid;
	}
	
	public function isAdmin()
	{
		return $this->roleid == 1;
	}
}