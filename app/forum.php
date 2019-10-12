<?php

namespace Aplikacja;

class Forum{
	
	
	public function pobierzKategorie(){
		$db = new DB();
		$db -> query("SELECT * FROM forum_category ORDER BY kolejnosc ASC");
		return $db -> resultSet();
	}
	
	public function pobierzForum($kat){
		$db = new DB();
		$db -> query("SELECT * FROM forums WHERE kat_id = :kategoria ORDER BY kolejnosc ASC");
		$db -> bind(':kategoria', $kat);
		return $db -> resultSet();
	}
	
	public static function selectCatNameById($id){
		$db = new DB();
		$db -> query("SELECT name FROM forum_category WHERE id = :id");
		$db -> bind(':id', $id);
		$name = $db -> single();
		return $name['name'];
	}
}