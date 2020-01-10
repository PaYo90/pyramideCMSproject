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
	public $avatar;
	
	public function __construct($id, $email, $username, $imie, $nazwisko, $roleid, $avatar)
	{
		$this->id = $id;
		$this->email = $email;
		$this->username = $username;
		
		$this->imie = $imie;
		$this->nazwisko = $nazwisko;
		$this->roleid = $roleid;

		$this->avatar = $avatar;
	}
	
	public function isAdmin()
	{
		return $this->roleid == 1;
	}

    public static function verifyUserSession() {
        if (empty($_SESSION['user'])) {
            header("Location:http://" . ROOT_APP_URL . "/loginForm");
            return;
        }
    }

    public static function verifyIfLogged() {
        if (isset($_SESSION['user'])) {
            header("Location:http://" . ROOT_APP_URL);
            return;
        }
    }

    public static function checkIfOnline($id){
	    $db = new DB();
	    $db -> query("SELECT last_online FROM users WHERE id = :id");
	    $db -> bind(':id', $id);
	    $lasttime = $db -> single();

        $farray = explode(' ', $lasttime['last_online']);
        $YMD = explode('-', $farray[0]);
        $HMS = explode(':', $farray[1]);

        $UNIXtimeFROMdb = mktime($HMS[0], $HMS[1], $HMS[2], $YMD[1], $YMD[2], $YMD[0]);

        $iloscsekund = time() - $UNIXtimeFROMdb;

	    if($iloscsekund > 60){
	        return "status status-offline";
        }else{
	        return "status status-success";
        }
    }
}