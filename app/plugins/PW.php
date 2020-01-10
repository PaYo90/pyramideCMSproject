<?php


namespace Aplikacja;


class PW
{
    public static function sendMessage($post){
        User::verifyUserSession();

        $db = new DB();
        $db -> query("INSERT INTO pw (conversation_id, content, user_id, ifread, adresat_name) VALUES (:con_id, :tresc, :user_id, :ifread, :recipient)");
        $db -> bind(':con_id', $post['conid']);
        $db -> bind(':tresc', $post['tresc']);
        $db -> bind(':user_id', $_SESSION[ 'user' ]->id);
        $db -> bind(':ifread', 0);
        $db -> bind(':recipient', $post['adresat']);
        $db -> execute();
        $msgid = $db -> lastInsertId();

        header("Location:http://".ROOT_APP_URL."/ReadMsg/".$post['conid']."#msg-".$msgid);
        return true;
    }

    public static function showInbox($id){
        User::verifyUserSession();


        $id = $_SESSION['user']->id;


        $user = self::takeUserCre($id);

        $title = "Inbox of ".$user['username']." - ".SITE_NAME;
        $ActiveMenuCategory="MAIN";
        $ActiveMenuSubCategory="inbox";

        $conversations = self::takeConversations($id);

        Debug::dodaj(var_export($conversations, true), false);

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/inbox_general.php")));
        return true;
    }

    public static function showWriteMessage(){
        User::verifyUserSession();

        $user = self::takeUserCre($_SESSION['user']->id);

        $title = "Inbox of ".$user['username']." - ".SITE_NAME;
        $ActiveMenuCategory="MAIN";
        $ActiveMenuSubCategory="inbox";

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/inbox_write.php")));
        return true;
    }

    public static function showReadMessage($id){
        User::verifyUserSession();

        $conversation = self::takeConversation($id);
        $messages = self::takeMessages($id);
        $msgcount = count($messages);

        if($conversation['author_id'] == $_SESSION['user']->id){
            $adresat = $conversation['adresat_name'];
        }elseif($conversation['adresat_id'] == $_SESSION['user']->id){
            $adresat = $conversation['author_name'];
        }

        $title = $conversation['subject']. " - ".SITE_NAME;
        $ActiveMenuCategory="MAIN";
        $ActiveMenuSubCategory="inbox";

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/inbox_read.php")));
        return true;
    }

    public static function readMsg($id){
        $db = new DB();
        $db -> query("UPDATE PW SET ifread = 1 WHERE id = :id");
        $db -> bind (':id', $id);
        $db -> execute();
    }

    public static function countNewConversations($ID){
        $db = new DB();
        $db -> query("SELECT count(id) FROM conversations WHERE (author_id = :id AND ifnew_sender = 1) OR (adresat_id = :id AND ifnew_odbiorca = 1)");
        $db -> bind (':id', $ID);
        $wynik = $db -> single();
        return $wynik['count(id)'];
    }

    public static function countAllConversations($ID){
        $db = new DB();
        $db -> query("SELECT count(id) FROM conversations WHERE author_id = :id OR adresat_id = :id ");
        $db -> bind (':id', $ID);
        $wynik = $db -> single();
        return $wynik['count(id)'];
    }

    public static function takeMessages($id){
        $db = new DB();

        $db -> query("SELECT * FROM pw WHERE conversation_id = :id");
        $db -> bind (':id', $id);
        return $db -> resultSet();
    }

    public static function takeConversation($id){
        $db = new DB();

        $db -> query("SELECT * FROM conversations WHERE id = :id");
        $db -> bind (':id', $id);
        return $db -> single();
    }

    public static function showMessage($msg_id){
        User::verifyUserSession();

        //spr czy author ID z BD albo adresat rowna sie zmienna sesyjna aby sprawdzic czy ta osoba moze go wyswietlac, jak nie to error

        $db = new DB();
        $db -> query("SELECT * FROM conversations WHERE id = :msg_id");
        $db -> bind (':msg_id', $msg_id);
        $con_info = $db -> single();

        $db = new DB();
        $db -> query("SELECT * FROM pw WHERE conversation_id = :msg_id ORDER BY id ASC");
        $db -> bind (':msg_id', $msg_id);
        $msg_info = $db -> resultSet();

        if($con_info ['author_id'] != $_SESSION['user']->id)
        {
            Die();
        }

        $user = self::takeUserCre($_SESSION['user']->id);

        $title = "Inbox of ".$user['username']." - ".SITE_NAME;
        $ActiveMenuCategory="MAIN";
        $ActiveMenuSubCategory="inbox";

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/inbox_read.php")));
        return true;
    }

    public static function establishNewConversation($zmienne){
        User::verifyUserSession();

        $recipients = str_replace(",", " ", $zmienne['recipients']);
        $ccrecipients = str_replace(",", " ", $zmienne['ccrecipients']);

        $recipients = explode(" ", $recipients);
        $ccrecipients = explode(" ", $ccrecipients);

        $db = new DB();
        foreach ($recipients as $recipient){
            if($recipient != "" AND self::checkUserExistence($recipient) != false) {//if recipient is in the database and if recipient isnt null - send msg
                $tresc = $zmienne['tresc'];
                $recipientid = self::takeUserId($recipient);

                $db->query( "INSERT INTO conversations (subject, author_id, author_name, adresat_name) VALUES (:subject, :author_id, :author_name, :adresat_name)" );
                $db->bind( ':subject', $zmienne[ 'subject' ] );
                $db->bind( ':author_id', $_SESSION[ 'user' ]->id );
                $db->bind( ':author_name', $_SESSION[ 'user' ]->username );
                $db->bind( ':adresat_name', $recipient );
                $db->bind( ':adresat_id', $recipientid );
                $db -> execute();

                $last_insert_id = $db ->lastInsertId();

                $db -> query("INSERT INTO pw (conversation_id, content, user_id, ifread, adresat_name) VALUES (:con_id, :tresc, :user_id, :ifread, :recipient)");
                $db -> bind(':con_id', $last_insert_id);
                $db -> bind(':tresc', $tresc);
                $db -> bind(':user_id', $_SESSION[ 'user' ]->id);
                $db -> bind(':ifread', 0);
                $db -> bind(':recipient', $recipient);
                $db -> execute();


                Messages::setSuccess("Message successfuly sent to $recipient");
            }elseif (self::checkUserExistence($recipient) == false){

                Messages::setError("There is no user $recipient");
            }
        }

        header("Location:http://".ROOT_APP_URL."/inbox");
        return true;
    }
    //check if user exist
    public static function checkUserExistence($name){
        $db = new DB();
        $db -> query("SELECT username FROM users WHERE username = :name");
        $db ->bind(":name", $name);
        return $db -> single();
    }

    public static function checkIfRead($id){
        $db = new DB();
        $db -> query("SELECT ifread FROM pw WHERE id = :id");
        $db -> bind(":id", $id);
        return $db -> single();
    }

    public static function takeUserCre($id){
        $db = new DB();
        $db -> query("SELECT * FROM users WHERE id = :id");
        $db ->bind(":id", $id);
        return $db -> single();
    }

    public static function takeUserId($username){
        $db = new DB();
        $db -> query("SELECT id FROM users WHERE username = :username");
        $db ->bind(":username", $username);
        return $db -> single();
    }

    public static function takeConversations(){
        $db = new DB();
        $db -> query("SELECT * FROM conversations WHERE author_name = :user_id OR adresat_name = :user_id ORDER BY last_update DESC");
        $db -> bind(":user_id", $_SESSION['user']->username);
        return $db -> resultSet();
    }

    public static function takePrivateMessages($id){
        $db = new DB();
        $db -> query("SELECT * FROM PW WHERE user_id = :user_id");
        $db -> bind(":user_id", $id);
        return $db -> resultSet();
    }
}