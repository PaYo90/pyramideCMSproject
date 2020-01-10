<?php


namespace Aplikacja;


class WEB_TOON
{
    public static function showComic($nr){
        User::verifyUserSession();

        $title = "Comic - ".SITE_NAME;
        $ActiveMenuCategory="MAIN";
        $ActiveMenuSubCategory="comics";

        require("themes/smartadmin/Web_tOOn/comic_profile.php");
        return false;
    }

    public static function addNewForm($title, $style, $initials, $genre, $releasedate){//zrobic walidacje ktora odsyla do formy, jesli cos nie dziala
        User::verifyUserSession();//todo resize  thumbnail - done

        $target_dir = "uploads/tmp/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check file size
        if ($_FILES["fileToUpload"]["size"] > 2000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            $name = "okladka";

            $db = new DB();
            $db -> query("INSERT INTO comics (name, genre, author_id, style, releasedate,  inicjaly, cover_file_name) VALUES (:name, :genre, :author, :style, :releasedate, :initials, :cover_file_name)");
            $db -> bind (':name', $title);
            $db -> bind (':author', $_SESSION['user']->id);
            $db -> bind (':style', $style);
            $db -> bind (':initials', $initials);
            $db -> bind (':genre', $genre);
            $db -> bind (':releasedate', $releasedate);
            $db -> bind (':cover_file_name', $name.".".$imageFileType);

            $db->execute();

            $id = $db->lastInsertId();

            if ($id) {
                $target_dir = "uploads/" . $id . "/";
                $target_file = $target_dir . basename($name.".".$imageFileType);
                mkdir("uploads/".$id, 0777);

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }else{
                echo "error while connecting to DataBase";
            }
        }
    }

    public static function wyswietlanieobrazka(){

    }

    public static function ciecieObrazuA4(){

    }
    public static function ciecieObrazuWorm(){

    }

    public static function getIndexComics($id){
        $db = new DB();

        $db -> query("SELECT * FROM comics WHERE author_id = :id");
        $db -> bind(':id', $id);
        return $db -> resultSet();
    }

    public static function profileIndex($id){
        User::verifyUserSession();//@TODO: dodaj tutaj guest mode?

        $title = "Add New Comic - ".SITE_NAME;
        $ActiveMenuCategory="MAIN";
        $ActiveMenuSubCategory="comics";

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/Web_tOOn/profilecomicsindex.view.php")));
        return false;
    }

    public static function addNewShow(){
        User::verifyUserSession();

        $title = "Add New Comic - ".SITE_NAME;
        $ActiveMenuCategory="MAIN";
        $ActiveMenuSubCategory="comics";

        require("themes/smartadmin/Web_tOOn/comic_add.php");
        return false;
    }
}