<?php

use Aplikacja\DB;

if($_POST['id']) {
    include_once ("../../DBconfig.php");

    include_once("../ModelsAndControllers/DB.php");
    include_once("../ModelsAndControllers/Debug.php");
    include_once("../site_settings/gallery.php");

    $db = new DB();

    $namearray = explode(".", $_POST['name']);
    $namelenght = count($namearray);

    for($i=0;$i<$namelenght;$i++){
        if($i == $namelenght - 2){
            $name = $name . $namearray[$i] . "_%.";
        } else {
            $name = $name . $namearray[ $i ];
        }
    }

    $db -> query("SELECT deletehash, name FROM gallery WHERE user_id = :id AND name LIKE :name ORDER BY id DESC LIMIT 1");
    $db->bind( ':id', $_POST[ 'id' ] );
    $db->bind( ':name', $name);
    $hash = $db->single();

    if($hash['deletehash'] == 0){
        echo "Chyba próbujesz obejść system. Nie wolno...";
        Die();
    }

    if($_POST['deletehash'] == $hash['deletehash'])
    {
        $db->query( "DELETE FROM gallery WHERE name LIKE :name AND user_id = :id " );
        $db->bind( ':id', $_POST[ 'id' ] );
        $db->bind( ':name', $hash['name'] );
        $db->execute();

        if( MOVE_DELETED_TO_BIN == 1 ) {
            if (array_key_exists('album', $_POST)){
                if(!file_exists("../../IMAGES/gallery/_deleted/" . $_POST[ 'id' ])){mkdir("../../IMAGES/gallery/_deleted/" . $_POST[ 'id' ]); }
                if(!file_exists("../../IMAGES/gallery/_deleted/" . $_POST[ 'id' ] . "/album_" . $_POST[ 'album' ])){mkdir("../../IMAGES/gallery/_deleted/" . $_POST[ 'id' ] . "/album_" . $_POST[ 'album' ]); }
                if(!file_exists("../../IMAGES/gallery/_deleted/" . $_POST[ 'id' ] . "/album_" . $_POST[ 'album' ] . "/small")){mkdir("../../IMAGES/gallery/_deleted/" . $_POST[ 'id' ] . "/album_" . $_POST[ 'album' ] . "/small"); }

                rename( "../../IMAGES/gallery/" . $_POST[ 'id' ] . "/album_" . $_POST[ 'album' ] . "/" . $hash[ 'name' ], "../../IMAGES/gallery/_deleted/" . $_POST[ 'id' ] . "/album_" . $_POST[ 'album' ] . "/" . $hash[ 'name' ] );
                rename( "../../IMAGES/gallery/" . $_POST[ 'id' ] . "/album_" . $_POST[ 'album' ] . "/small/" . $hash[ 'name' ],"../../IMAGES/gallery/_deleted/" . $_POST[ 'id' ] . "/album_" . $_POST[ 'album' ] . "/small/" . $hash[ 'name' ] );
            }else{
                if(!file_exists("../../IMAGES/gallery/_deleted/" . $_POST[ 'id' ] )){ mkdir("../../IMAGES/gallery/_deleted/" . $_POST[ 'id' ]); }
                if(!file_exists("../../IMAGES/gallery/_deleted/" . $_POST[ 'id' ] . "/small")){ mkdir("../../IMAGES/gallery/_deleted/" . $_POST[ 'id' ] . "/small"); }

                rename( "../../IMAGES/gallery/" . $_POST[ 'id' ] . "/" . $hash[ 'name' ], "../../IMAGES/gallery/_deleted/" . $_POST[ 'id' ] . "/" . $hash[ 'name' ] );
                rename( "../../IMAGES/gallery/" . $_POST[ 'id' ] . "/small/" . $hash[ 'name' ], "../../IMAGES/gallery/_deleted/" . $_POST[ 'id' ] . "/small/" . $hash[ 'name' ] );
            }

        } else {
            if ( array_key_exists( 'album', $_POST ) ) {
                unlink( "../../IMAGES/gallery/" . $_POST[ 'id' ] . "/album_" . $_POST[ 'album' ] . "/" . $hash[ 'name' ] );
                unlink( "../../IMAGES/gallery/" . $_POST[ 'id' ] . "/album_" . $_POST[ 'album' ] . "/small/" . $hash[ 'name' ] );
            } else {
                unlink( "../../IMAGES/gallery/" . $_POST[ 'id' ] . "/" . $hash[ 'name' ] );
                unlink( "../../IMAGES/gallery/" . $_POST[ 'id' ] . "/small/" . $hash[ 'name' ] );
            }
        }
        echo json_encode($_POST);
    }else{
        $db -> query("UPDATE gallery SET deletehash = 0 WHERE user_id = :id AND name LIKE :name");
        $db->bind( ':id', $_POST[ 'id' ] );
        $db->bind( ':name', $hash['name']);
        $db -> execute();
    }
}

