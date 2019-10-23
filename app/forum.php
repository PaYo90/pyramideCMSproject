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
	
	public function selectThreads($forumId=1){
		$db = new DB();
		//$db -> query("SELECT t.*, (SELECT max(p.made_date) FROM posts p WHERE p.thread_id = t.id) AS last_post, (SELECT p.author FROM posts p WHERE p.thread_id = t.id ORDER BY p.made_date DESC LIMIT 1) AS post_author, (SELECT p.content FROM posts p WHERE p.thread_id = t.id ORDER BY p.made_date DESC LIMIT 1) AS post_content FROM thread t WHERE t.forum_id = :forum_id ORDER BY t.sticky DESC, last_post DESC");
		$db -> query("SELECT t.*, p.content, p.author as post_author, p.made_date as last_post_made_date FROM thread t, posts p WHERE forum_id = :forum_id AND p.thread_id = t.id ORDER BY t.sticky DESC, last_post_made_date DESC");
		$db -> bind(':forum_id', $forumId);
		return $db -> resultSet();
	}
}