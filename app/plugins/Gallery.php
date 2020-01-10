<?php


namespace Aplikacja;


class Gallery
{
    public static function showGallery($id){
        User::verifyUserSession();

        if(!$id){
            $id = $_SESSION['user']->id;
        }

        $albums = Gallery::indexAlbum($id);
        $username = Gallery::takeUserName($id);

        $title = "Gallery of ".$username['username']." - ".SITE_NAME;
        $ActiveMenuCategory="MAIN";
        $ActiveMenuSubCategory="gallery";

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/website_parts/gallery.php")));
        return true;
    }

    public static function updateAlbum($post){
        User::verifyUserSession();

        $db = new DB();
        $db -> query("UPDATE albums SET title = :title, description = :desc WHERE id = :id");
        $db -> bind(':id', $post['id']);
        $db -> bind(':desc', $post['desc']);
        $db -> bind(':title', $post['title']);

        $db->execute();

        self::setBgAlbum($post['id'], $post['imgid']);

        header("Location:http://".ROOT_APP_URL."/gallery");
        return true;
    }

    public static function uploadImages($image, $album=false){
        User::verifyUserSession();

        //Dashboard::debug(var_export($image, true));

        $target_dir = "uploads/tmp/";
        $target_file = $target_dir . basename($image["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($image["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";

                Dashboard::debug("nie przeszlo przy to nie obrazek");
                $uploadOk = 0;
            }
        }
// Check file size
        if ($image["size"] > 2097152) {
            echo "Sorry, your file is too large.";

            Dashboard::debug("nie przeszlo przy size");
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            Dashboard::debug("nie przeszlo przy type");
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

            Dashboard::debug("nie przeszlo ogolnie");
// if everything is ok, try to upload file
        } else {
            $namearray = explode(".", $image['name']);
            $namelenght = count($namearray);
            $name = $image['name'];
            if($album['album']){

                $target_dir = "IMAGES/gallery/" . $_SESSION['user']->id . "/". "album_" . $album['album'] ."/";
                $target_dir_ = "IMAGES/gallery/_deleted/" . $_SESSION['user']->id . "/". "album_" . $album['album'] ."/";

                mkdir("IMAGES/gallery/" . $_SESSION['user']->id, 0777);
                mkdir("IMAGES/gallery/" . $_SESSION['user']->id . "/" . "album_" . $album['album'], 0777);
                mkdir("IMAGES/gallery/" . $_SESSION['user']->id . "/small", 0777);
                mkdir("IMAGES/gallery/" . $_SESSION['user']->id . "/" . "album_" . $album['album'] . "/small", 0777);
                $wi = 0;
               while(file_exists($target_dir.$name) OR file_exists($target_dir_.$name)){
                   $wi++;
                   $name = "";
                   for($i=0;$i<$namelenght;$i++){
                       if($i == $namelenght - 2){
                           $name = $name . $namearray[$i] . "_" . $wi;
                       } elseif ($i == $namelenght - 1) {
                           $name = $name . '.' . $namearray[ $i ];
                       } else {
                           $name = $name . $namearray[ $i ];
                       }
                   }
               }
            }else {

                $target_dir = "IMAGES/gallery/" . $_SESSION['user']->id . "/";
                $target_dir_ = "IMAGES/gallery/_deleted/" . $_SESSION['user']->id . "/";

                mkdir("IMAGES/gallery/" . $_SESSION['user']->id, 0777);
                mkdir("IMAGES/gallery/" . $_SESSION['user']->id . "/small", 0777);

                while(file_exists($target_dir.$name) OR file_exists($target_dir_.$name)){
                    $wi++;
                    $name = "";
                    for($i=0;$i<$namelenght;$i++){
                        if($i == $namelenght - 2){
                            $name = $name . $namearray[$i] . "_" . $wi;
                        } elseif ($i == $namelenght - 1) {
                            $name = $name . '.' . $namearray[ $i ];
                        } else {
                            $name = $name . $namearray[ $i ];
                        }
                    }
                }
            }

            //$name = $namearray['0']."_".rand(0,999999).".".$namearray['1'];
            if(!array_key_exists('album', $album)){
                $db = new DB();
                $db -> query("INSERT INTO gallery (name, user_id, alt, description, size, deletehash) VALUES (:name, :userid, :alt, :description, :size, :delete)");
                $db ->bind(':name', $name);
                $db ->bind(':userid', $_SESSION['user']->id);
                $db ->bind(':alt', "");
                $db ->bind(':description', "");
                $db ->bind(':size', $image['size']);
                $db ->bind(':delete', $album['deletehash']);
                $db->execute();

                $id = $db->lastInsertId();
            }else{
                $db = new DB();
                $db -> query("INSERT INTO gallery (name, user_id, alt, description, size, deletehash, album_id) VALUES (:name, :userid, :alt, :description, :size, :delete, :album)");
                $db ->bind(':name', $name);
                $db ->bind(':userid', $_SESSION['user']->id);
                $db ->bind(':alt', "");
                $db ->bind(':description', "");
                $db ->bind(':size', $image['size']);
                $db ->bind(':delete', $album['deletehash']);
                $db ->bind(':album', $album['album']);
                $db->execute();

                $id = $db->lastInsertId();
            }


            if ($id) {

                $target_file = $target_dir . basename($name);

                if (move_uploaded_file($image["tmp_name"], $target_file)) {
                    echo "The file " . basename($name) . " has been uploaded.";

                    $imgh = new myIMagick();

                    $img = $imgh->resize(160, 160, realpath($target_file));
                    file_put_contents($target_dir . "small/" . basename($name), $img);
                } else {

                }
            }
        }
    }

    public static function deleteAlbum($id){//TODO: skasowane pliki przenosic do kosza i wyswietlac je u admina jako ostatnio skasowane z informacja i urzytkowniku
        User::verifyUserSession();

        $db = new DB();
        $db -> query("DELETE FROM albums WHERE id = :id");
        $db -> bind(':id', $id);
        $db -> execute();

        $db -> query("DELETE FROM gallery WHERE album_id = :id");
        $db -> bind(':id', $id);
        $db -> execute();

        header("Location:http://".ROOT_APP_URL."/gallery");
        return true;
    }

    public static function makeAlbum($post){
        User::verifyUserSession();

        $db = new DB();
        $db -> query("INSERT INTO albums (title, description, user_id) VALUES (:title, :desc, :userid)");
        $db -> bind(':title', $post['title']);
        $db -> bind(':desc', $post['desc']);
        $db -> bind(':userid', $_SESSION['user']->id);

        $db -> execute();

        header("Location:http://".ROOT_APP_URL."/gallery");
        return true;
    }

    public static function showAlbum($albumid=NULL){
        User::verifyUserSession();

        if($albumid==NULL){
            header("Location:http://".ROOT_APP_URL."/gallery");
            return true;
        }

        $db = new DB();
        $db -> query("SELECT * FROM albums WHERE id = :albumid");
        $db -> bind(':albumid', $albumid);

        $album = $db -> single();

        $username = Gallery::takeUserName($album['user_id']);

        $db = new DB();
        $db -> query("SELECT * FROM gallery WHERE album_id = :albumid");
        $db -> bind(':albumid', $albumid);

        $gallery = $db -> resultSet();

        $title = "Gallery of ".$album['user_id']." - ".SITE_NAME;
        $ActiveMenuCategory="MAIN";
        $ActiveMenuSubCategory="gallery";

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/website_parts/album.php")));
        return true;


    }
/* chyba sie powtarza
    public static function editAlbum($post){
        User::verifyUserSession();

        $db = new DB();
        $db -> query("UPDATE albums SET title = :title, description = :desc WHERE id = :id");
        $db -> bind(':title', $post['title']);
        $db -> bind(':desc', $post['desc']);
        $db -> bind(':id', $_SESSION['user']->id);

        $db -> execute();

        header("Location:http://".ROOT_APP_URL."/gallery");
        return true;
    }
*/
    public static function editPhoto(){

    }

    public static function indexAlbum($id){
        User::verifyUserSession();

        $db = new DB();
        $db -> query("SELECT * FROM albums WHERE user_id = :userid");
        $db -> bind(':userid', $id);

        return $db -> resultSet();
    }

    public static function takeUserName($id){
        User::verifyUserSession();

        $db = new DB();
        $db -> query("SELECT username FROM users WHERE id = :userid");
        $db -> bind(':userid', $id);

        return $db -> single();
    }

    public static function galleryAlbumList($album){
        User::verifyUserSession();

        $db = new DB();
        $db -> query("SELECT alt, name, id FROM gallery WHERE album_id = :id");
        $db -> bind(':id', $album);
        return $db -> resultSet();
    }

    public static function setBgAlbum($id, $imgid){
        User::verifyUserSession();

        $db = new DB();
        $db -> query("UPDATE albums SET title_image = :imgid WHERE id = :id");
        $db -> bind(':id', $id);
        $db -> bind(':imgid', $imgid);
        $db -> execute();

    }

    public static function profile9newestPhotos($id){
        User::verifyUserSession();

        $db = new DB();
        $db -> query("SELECT * FROM gallery WHERE user_id = :id ORDER BY id DESC LIMIT 12");
        $db -> bind(':id', $id);
        $wyniki = $db -> resultSet();

        return $wyniki;
    }

    public static function takeBGTitle($id){
        User::verifyUserSession();

        $db = new DB();
        $db -> query("SELECT name FROM gallery WHERE id = :id");
        $db -> bind(':id', $id);

        return $db -> single();
    }

    public static function showAlbumPhotos($id, $album=0){
        User::verifyUserSession();

        $glimit = 100;
        $alimit = 100;

        if($album > 0) {
            $db = new DB();
            $db->query( "SELECT * FROM gallery WHERE user_id = :userid AND album_id = :albumid ORDER BY id DESC LIMIT :ALIMIT" );
            $db->bind( ':userid', $id);
            $db->bind( ':ALIMIT', $alimit);
            $db->bind( ':albumid', $album);
        }else{
            $db = new DB();
            $db->query( "SELECT * FROM gallery WHERE user_id = :userid ORDER BY id DESC LIMIT :GLIMIT" );
            $db->bind( ':userid', $id);
            $db->bind( ':GLIMIT', $glimit);
        }
        $obrazy = $db -> resultSet();

        if($album > 0) {
            foreach($obrazy as $obraz){
                $nazwa = $obraz['name'];
                $title = $obraz['alt'];
                $description = $obraz['description'];
                echo '
                <a class="" href="http://'.ROOT_APP_URL.'/IMAGES/gallery/'.$id.'/album_'.$album.'/'.$nazwa.'"  data-sub-html="'.$description.'">
                <img class="img-responsive" style="border-radius: 5px" src="http://'.ROOT_APP_URL.'/IMAGES/gallery/'.$id.'/album_'.$album.'/small/'.$nazwa.'" alt="'.$title.'">
                </a>
            ';
            }
        }else{
            foreach($obrazy as $obraz){
                $nazwa = $obraz['name'];
                $title = $obraz['alt'];
                $description = $obraz['description'];
                if ($obraz['album_id'] == NULL){
                    echo '
                <a class="" href="http://'.ROOT_APP_URL.'/IMAGES/gallery/'.$id.'/'.$nazwa.'"  data-sub-html="'.$description.'">
                <img class="img-responsive" style="border-radius: 5px" src="http://'.ROOT_APP_URL.'/IMAGES/gallery/'.$id.'/small/'.$nazwa.'" alt="'.$title.'">
                </a>
                 ';
                }else{
                    echo '
                    <a class="" href="http://'.ROOT_APP_URL.'/IMAGES/gallery/'.$id.'/album_'.$obraz['album_id'].'/'.$nazwa.'"  data-sub-html="'.$description.'">
                    <img class="img-responsive" style="border-radius: 5px" src="http://'.ROOT_APP_URL.'/IMAGES/gallery/'.$id.'/album_'.$obraz['album_id'].'/small/'.$nazwa.'" alt="'.$title.'">
                    </a>
                    ';
                }


            }
        }

    }
}