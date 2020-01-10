<?php


namespace Aplikacja;


class Diary
{
 public static function showPosts($ID){
     $db = new DB();
     $db -> query("SELECT dp.*, u.id as author_id, u.imie, u.nazwisko FROM diary_posts dp, users u WHERE dp.desired_profile_id = :id AND u.id = dp.author_id ORDER BY dp.id DESC");
     $db->bind(':id', $ID);
     return $db->resultSet();
 }

 public static function showPost($PostID){

 }

 public static function showComments($PostID){
     $db = new DB();
     $db -> query("SELECT dp.*, u.id as author_id, u.imie, u.nazwisko FROM diary_comments dp, users u WHERE dp.diary_post_id = :id AND u.id = dp.author_id ORDER BY dp.id ASC");
     $db->bind(':id', $PostID);
     return $db->resultSet();
 }

 public static function showCommentsToComments(){

 }

 public static function dateParser(){

 }

 public static function addComment($postid, $content, $author){
     //$content = textInterpreter::parse($content);

    $db = new DB();
    $db -> query("INSERT INTO diary_comments (author_id, content, diary_post_id) VALUES (:author, :content, :postid)");
    $db -> bind(':author', $author);
    $db -> bind(':content', $content);
    $db -> bind(':postid', $postid);
    $db -> execute();

     $db -> query("SELECT author_id FROM diary_posts WHERE id = :postid");
     $db -> bind (':postid', $postid);
     $profileid = $db -> single();

     $db -> query("SELECT username FROM users WHERE id = :id");
     $db -> bind (':id', $profileid['author_id']);
     $profilename = $db -> single();

    header( "Location:http://" . ROOT_APP_URL . "/profile/" . $profilename['username'] . "#" . $postid );
    return false;
 }

 public static function howManyComments($id){
     $db = new DB();
     $db -> query("SELECT COUNT(id) FROM diary_comments WHERE diary_post_id = :id");
     $db -> bind(':id', $id);
     return $db -> single();
 }
}