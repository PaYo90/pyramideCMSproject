<?php

namespace Aplikacja;

class Forum{
	
	
	public function pobierzKategorie(){
		$db = new DB();
		$db -> query("SELECT * FROM forum_category ORDER BY kolejnosc ASC");
		return $db -> resultSet();
	}

    public static function makeNewForum($post){
        Dashboard::isAdmin();

        $db = new DB();

        $db -> query("SELECT * FROM forum WHERE kolejnosc >= :kolejnosc AND kat_id = :kat_id ORDER BY kolejnosc DESC");
        $db -> bind (':kolejnosc', $this->post['ForumNumber']);
        $db -> bind (':kat_id', $this->post['KatID']);
        $zmianaKolejnosci = $db->resultSet();

        foreach($zmianaKolejnosci as $row){
            $row['kolejnosc']++;

            $db -> query("UPDATE forum SET kolejnosc = :kolejnoscNowa WHERE id = :id");
            $db -> bind ('kolejnoscNowa', $row['kolejnosc']);
            $db -> bind (':id', $row['id']);
            $db -> execute();

        }
        $db -> query("INSERT INTO forum (name, description, ikona, kat_id, kolejnosc) VALUES (:name, :description, :icon, :katid, :kolejnosc)");
        $db -> bind (':name', $post['ForumName']);
        $db -> bind (':description', $post['ForumDesc']);
        $db -> bind (':icon', $post['Icon']);
        $db -> bind (':katid', $post['KatID']);
        $db -> bind (':kolejnosc', $post['ForumNumber']);
        $db -> execute();

        if($db->lastInsertId()){
            Messages::setSuccess("Forum Dodane");
            header("Location:http://".ROOT_APP_URL."/forum");
            return;
        }else{
            Messages::setError("Forum nie dodane");
            header("Location:http://".ROOT_APP_URL."/forum");
            return;
        }

    }

    public static function makeNewThread($Forum_ID, $post){
        User::verifyUserSession();

        $db = new DB();
        $db -> query("INSERT INTO thread (name, forum_id, author, made_date) VALUES (:name, :forum_id, :author, now())");
        $db -> bind(':name', $post['ThreadName']);
        $db -> bind(':forum_id', $Forum_ID);
        $db -> bind(':author', $post['UserName']);
        $db -> execute();
        $threadId = $db -> lastInsertId();

        $db -> query("INSERT INTO f_posts (author, content, made_date, thread_id, forum_id) VALUES (:author, :content, now(), :thread_id, :forum_id)");
        $db -> bind (':author', $post['UserName']);
        $db -> bind (':content', $post['content']);
        $db -> bind (':thread_id', $threadId);
        $db -> bind (':forum_id', $Forum_ID);
        $db -> execute();
        $postId = $db -> lastInsertId();

        $db -> query("UPDATE thread SET last_post_id = :postId WHERE id = :threadId");
        $db -> bind (':postId', $postId);
        $db -> bind (':threadId', $threadId);
        $db -> execute();

        header("Location:http://".ROOT_APP_URL."/thread/".$threadId."/1");
        return;
    }

    public static function addPost($post){
        User::verifyUserSession();

        $db = new DB();

        $db -> query("INSERT INTO f_posts (author, content, made_date, thread_id, forum_id) VALUES (:autor, :kontent, now(), :idtematu, :forum_id)");
        $db -> bind (':autor', $post['UserName']);
        $db -> bind (':kontent', $post['Content']);
        $db -> bind (':idtematu', $post['ThreadId']);
        $db -> bind (':forum_id', $post['Forum_ID']);
        $db->execute();

        $forum = new Forum();
        $postsnbr = $forum -> countPosts($post['ThreadId']);
        $pagenbr = ceil($postsnbr['posts_quantity'] / FORUM_PAGE_OFFSET);


        header("Location:http://".ROOT_APP_URL."/thread/".$post['ThreadId']."/".$pagenbr);
        return;
    }
	
	public function pobierzForum($kat){//@TODO add inside a taking for a forum newest kontent in one query!
		$db = new DB();
		$db -> query("SELECT * FROM forum WHERE kat_id = :kategoria ORDER BY kolejnosc ASC");
		$db -> bind(':kategoria', $kat);
		return $db -> resultSet();
	}

	public static function pobierzIdForum($thread)
    {//used in forum_thread.view.php
        $db = new DB();
        $db -> query("SELECT forum_id FROM thread WHERE id = :thread");
        $db -> bind(':thread', $thread);
        return $db->single();
    }

	public static function countAllForumPosts($id){
	    $db = new DB();
	    $db -> query("SELECT COUNT(id) FROM f_posts WHERE forum_id = :id");
	    $db -> bind(':id', $id);
	    return $db -> single();
    }

    public static function countAllForumThreads($id){
        $db = new DB();
        $db -> query("SELECT COUNT(id) FROM thread WHERE forum_id = :id");
        $db -> bind(':id', $id);
        return $db -> single();
    }

	public static function newestPost($id){//todo zrobic aby content wyswietlal sie nad najnowszym postem na forum w kategoriach gdy najedzie sie myszka na nazwe tematu
        $db = new DB();
        $db -> query("SELECT t.name, t.id, (SELECT max(p.made_date) FROM f_posts p WHERE p.thread_id = t.id) AS last_post, (SELECT p.author FROM f_posts p WHERE p.thread_id = t.id ORDER BY p.made_date DESC LIMIT 1) AS post_author, (SELECT p.content FROM f_posts p WHERE p.thread_id = t.id ORDER BY p.made_date DESC LIMIT 1) AS post_content, (SELECT p.id FROM f_posts p WHERE p.thread_id = t.id ORDER BY p.made_date DESC LIMIT 1) FROM thread t WHERE t.forum_id = :forum_id ORDER BY last_post DESC LIMIT 1");
        $db -> bind(':forum_id', $id);
        return $db -> single();
    }
	
	public static function selectCatNameById($id){
		$db = new DB();
		$db -> query("SELECT name FROM forum_category WHERE id = :id");
		$db -> bind(':id', $id);
		$name = $db -> single();
		return $name['name'];
	}

	public static function showAllRangsAdmin(){
	    Dashboard::isAdmin();

        $db = new DB();
        $db -> query("SELECT * FROM f_rangs ORDER BY special ASC, post_amount_needed ASC");
        return $db -> resultSet();
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

	public static function addRang($name, $file, $viewsnr){
        Dashboard::isAdmin();
        if($file!=NULL) {
            $target_dir = "IMAGES/rangs/";
            $target_file = $target_dir . basename( $file[ "rang_img" ][ "name" ] );
            $uploadOk = 1;
            $imageFileType = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );
// Check if image file is a actual image or fake image
            if ( isset( $_POST[ "submit" ] ) ) {
                $check = getimagesize( $file[ "rang_img" ][ "tmp_name" ] );
                if ( $check !== false ) {
                    echo "File is an image - " . $check[ "mime" ] . ".";
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                    Messages::setError( "File is not an image." );
                }
            }
// Check file size
            if ( $file[ "rang_img" ][ "size" ] > 500000 ) {
                $uploadOk = 0;
                Messages::setError( "Sorry, your file is too large." );
            }
// Allow certain file formats
            if ( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                $uploadOk = 0;
                Messages::setError( "Sorry, only JPG, JPEG, PNG & GIF files are allowed." );

            }
// Check if $uploadOk is set to 0 by an error
            if ( $uploadOk == 0 ) {

                header( "Location:http://" . ROOT_APP_URL . "/AdminPanel" );
                return false;
// if everything is ok, try to upload file
            } else {

                $db = new DB();
                $db->query( "INSERT INTO f_rangs (nazwa, image, post_amount_needed, special) VALUES (:name, :file_name, :viewsnr, :special)" );
                $db->bind( ':name', $name );
                $db->bind( ':file_name', $file[ "rang_img" ][ "name" ] );
                if($viewsnr==NULL){
                    $db->bind( ':special', "yes" );

                    $db->bind( ':viewsnr', NULL );
                }else{
                    $db->bind( ':special', "no" );

                    $db->bind( ':viewsnr', $viewsnr );
                }

                $db->execute();

                $id = $db->lastInsertId();

                if ( $id ) {
                    if ( move_uploaded_file( $file[ "rang_img" ][ "tmp_name" ], $target_file ) ) {
                        Messages::setSuccess( "Ranga dodana!" );

                        header( "Location:http://" . ROOT_APP_URL . "/AdminPanel" );
                        return false;
                    } else {
                        Messages::setError( "Sorry, there was an error uploading your file." );

                        header( "Location:http://" . ROOT_APP_URL . "/AdminPanel" );
                        return false;
                    }
                } else {
                    Messages::setError( "error while connecting to DataBase." );

                    header( "Location:http://" . ROOT_APP_URL . "/AdminPanel" );
                    return false;
                }
            }
        }else{
            $db = new DB();
            $db->query( "INSERT INTO f_rangs (nazwa, post_amount_needed, special) VALUES (:name, :viewsnr, :special)" );
            $db->bind( ':name', $name );
            if($viewsnr==NULL){
                $db->bind( ':special', "yes" );

                $db->bind( ':viewsnr', NULL );
            }else{
                $db->bind( ':special', "no" );

                $db->bind( ':viewsnr', $viewsnr );
            }

            $db->execute();

            $id = $db->lastInsertId();

            if($id){
                Messages::setSuccess( "Ranga dodana!" );

                header( "Location:http://" . ROOT_APP_URL . "/AdminPanel" );
                return false;
            }else{
                Messages::setError( "error while connecting to DataBase." );

                header( "Location:http://" . ROOT_APP_URL . "/AdminPanel" );
                return false;
            }
        }
    }

    public static function changeRangNumber($id, $post_amount_needed){
        Dashboard::isAdmin();

        $db = new DB();
        $db -> query("UPDATE f_rangs SET post_amount_needed = :post_amount_needed WHERE id = :id");
        $db -> bind(':id', $id);
        $db -> bind(':post_amount_needed', $post_amount_needed);
        $db -> execute();

        header( "Location:http://" . ROOT_APP_URL . "/AdminPanel" );
        return false;
    }

    public static function changeRangImage($id, $file, $nazwa, $viewsnbr, $special)
    {
        Dashboard::isAdmin();

        $target_dir = "IMAGES/rangs/";
        $target_file = $target_dir . basename( $file[ "image" ][ "name" ] );
        $uploadOk = 1;
        $imageFileType = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );
// Check if image file is a actual image or fake image
        if ( isset( $_POST[ "submit" ] ) ) {
            $check = getimagesize( $file[ "image" ][ "tmp_name" ] );
            if ( $check !== false ) {
                echo "File is an image - " . $check[ "mime" ] . ".";
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
                Messages::setError( "File is not an image." );
            }
        }
// Check file size
        if ( $file[ "image" ][ "size" ] > 2000000 ) {
            $uploadOk = 0;
            Messages::setError( "Sorry, your file is too large." );
        }
// Allow certain file formats
        if ( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $uploadOk = 0;
            Messages::setError( "Sorry, only JPG, JPEG, PNG & GIF files are allowed." );

        }
// Check if $uploadOk is set to 0 by an error
        if ( $uploadOk == 0 ) {

            header( "Location:http://" . ROOT_APP_URL . "/AdminPanel" );
            return false;
// if everything is ok, try to upload file
        } else {

            $db = new DB();
            $db->query( "REPLACE INTO f_rangs (id, nazwa, image, post_amount_needed, special) VALUES (:id, :name, :image_name, :post_amount_needed, :special)" );
            $db->bind( ':id', $id);
            $db->bind( ':name', $nazwa);
            $db->bind( ':image_name', $file["image"]["name"]);
            $db->bind( ':post_amount_needed', $viewsnbr);
            $db->bind( ':special', $special);

            $db->execute();

            $id = $db->rowsAffected();

            if ( $id > 0) {
                if ( move_uploaded_file( $file[ "image" ][ "tmp_name" ], $target_file ) ) {
                    Messages::setSuccess( "Obrazek zmieniony" );

                    header( "Location:http://" . ROOT_APP_URL . "/AdminPanel" );
                    return false;
                } else {
                    Messages::setError( "Sorry, there was an error uploading your file." );

                    header( "Location:http://" . ROOT_APP_URL . "/AdminPanel" );
                    return false;
                }
            } else {
                Messages::setError( "error while connecting to DataBase." );

                header( "Location:http://" . ROOT_APP_URL . "/AdminPanel" );
                return false;
            }
        }

    }


    public static function deleteRang($id){
        Dashboard::isAdmin();

        $db = new DB();
        $db -> query("DELETE FROM f_rangs WHERE id = :id");
        $db -> bind(':id', $id);
        $db -> execute();

        header( "Location:http://" . ROOT_APP_URL . "/AdminPanel" );
        return true;
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