<?php

namespace Aplikacja;

class Forum{
	
	
	public function pobierzKategorie(){
		$db = new DB();
		$db -> query("SELECT * FROM forum_category ORDER BY kolejnosc ASC");
		return $db -> resultSet();
	}
	
	public function pobierzForum($kat){//@TODO add inside a taking for a forum newest kontent in one query!
		$db = new DB();
		$db -> query("SELECT * FROM forum WHERE kat_id = :kategoria ORDER BY kolejnosc ASC");
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
	
	public function addView($threadid){
		$db = new DB();
		
		$db -> query ("SELECT views FROM thread WHERE id = :id");
		$db -> bind (':id', $threadid);
		$tvnbr = $db -> single();
		
		$db -> query ("UPDATE thread SET views = :tvnbr WHERE id = :id");
		$db -> bind ('tvnbr', ++$tvnbr['views']);
		$db -> bind ('id', $threadid);
		$db -> execute();
		return;
	}
	
	public function selectThreads($forumId="1", $page){
		$OFFSET = ((int)$page-1)*FORUM_THREADS_OFFSET;
		
		$db = new DB();
		$db -> query("SELECT t.*, (SELECT max(p.made_date) FROM f_posts p WHERE p.thread_id = t.id) AS last_post, (SELECT p.author FROM f_posts p WHERE p.thread_id = t.id ORDER BY p.made_date DESC LIMIT 1) AS post_author, (SELECT p.content FROM f_posts p WHERE p.thread_id = t.id ORDER BY p.made_date DESC LIMIT 1) AS post_content FROM thread t WHERE t.forum_id = :forum_id ORDER BY t.sticky DESC, last_post DESC LIMIT :limit OFFSET :offset");
		$db -> bind(':forum_id', $forumId);
		$db -> bind (':limit', FORUM_THREADS_OFFSET);
		$db -> bind (':offset', $OFFSET);
		return $db -> resultSet();
	}
	
	public function countThreads($forumid){
		$db = new DB();
		
		$db -> query ("SELECT COUNT(id) as ilosc FROM thread WHERE forum_id = :fid");
		$db -> bind (':fid', $forumid);
		return $db -> single();
	}
	
	public function countPosts($threadId){
		$db = new DB();
		
		$db -> query ("SELECT COUNT(id) as posts_quantity FROM f_posts WHERE thread_id = :tid");
		$db -> bind (':tid', $threadId);
		return $db -> single();
	}
	
	public function selectPosts($threadId, $page){
		$OFFSET = ($page-1)*FORUM_PAGE_OFFSET; 
		
		
		$db = new DB();
		$db -> query ("SELECT p.*, t.id as t_id, t.name FROM f_posts p, thread t WHERE p.thread_id = :tid AND t.id = p.thread_id ORDER BY id ASC LIMIT :limit OFFSET :offset");
		$db -> bind (':tid', $threadId);
		$db -> bind (':limit', FORUM_PAGE_OFFSET);
		$db -> bind (':offset', $OFFSET);
		return $db -> resultSet();
	}
	
	/*
	public function countPagesOfThread($threadid){
		$db = new DB();
		
		$db -> query ("SELECT pages FROM thread WHERE id = :id");
		$db -> bind (':id', $threadid);
		
		return $db -> single();
	}*/
	
	public function checkIfLiked($postId){
		$db = new DB();
		$db ->query("SELECT id FROM liked WHERE post_id = :post_id AND user_id = :user_id AND dla = 1");
		$db -> bind (':post_id', $postId);
		$db -> bind (':user_id', $_SESSION['user']->id);
		$check = $db -> single();
		
		if($check){
			return false;
		}else{
			return true;
		}
	}
}