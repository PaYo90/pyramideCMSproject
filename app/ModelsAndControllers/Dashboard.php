<?php

namespace Aplikacja;

class Dashboard
{
	private $request;
	private $post;
	private $get;
	
	public function __construct($request){//usuwa dane get z url dla ladnego wygladu
		$requestString = explode("?", $request);
		$this->request = empty($requestString) ? $request : $requestString[0];
	}
	
	public function ProcessRequest()
	{
		if(!$this->request)
		{
			return;
		}
		if(isset($_SESSION['user']) && $_SESSION['user']->isAdmin()){//jesli admin to brak filtrowania znakow html, dla zapisywania ikon w bazie przy kreacji kategorii forum
			
			$this -> post = str_replace("\"", "&quot;", $_POST);
			$this -> get = str_replace("\"", "&quot;", $_GET);
		}else{
			$this -> post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
			$this -> get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		}
			//pozbywa sie "/" z requesta, pozwala na pobieranie drugiej wartosci po nazwie podstrony, taki userfriendly link
		$urlArray = explode("/", $this->request);

		$clean_url = array_filter($urlArray);


        if(empty($clean_url['1'])){ $clean_url['1']=""; }
		if(empty($clean_url['2'])){ $clean_url['2']=""; }
		if(empty($clean_url['3'])){ $clean_url['3']=""; }
		if(empty($clean_url['4'])){ $clean_url['4']=""; }
		if(empty($clean_url['5'])){ $clean_url['5']=""; }
		if(empty($clean_url['6'])){ $clean_url['6']=""; }
		
		//dodac explode na # i sprawdzic czy mozna zrobic z tego kolejny cleanUrl do posta na require w show
		
		switch ($clean_url['1'])//ROUTES
		{
			case "":
				$this->showDashboard();
				break;
			case "registerForm":
				$this->showRegister();
				break;
			case "loginForm":
				$this->showLogin($this->post);
				break;
			case "register":
				$this->register();
				break;
			case "afterRegistration":
				$this->showAfterRegistration();
				break;
			case "login":
				$this->login();
				break;
			case "forgetForm":
				$this->showForget();
				break;
			case "passwordResetForm":
				$this->showPasswordReset();
				break;
			case "forgot":
				$this->forgot();
				break;
			case "resetPassword":
				$this->resetPassword();
				break;
			case "profile":
				$this->showProfile($clean_url['2']);
				break;
			case "changePassword":
				$this->changePassword();
				break;
			case "changeCredentials":
				$this->changeCredentials();
				break;
			case "showActivated":
				$this->showActivated();
				break;
			case "activation":
				$this->activation();
				break;
			case "resendEmailActivation":
				$this->showResendEmailActivation();
				break;
			case "logout":
				$this->logout();
				break;
			case "AdminPanel":
				$this->showAdminPanel();
				break;
			case "adminChangeEmail":
				$this->adminChangeEmail();
				break;
			case "searchUserAdmin":
				$this->searchUserAdmin($this->post['searchAnything']);
				break;
			case "forum":
				$this->forum($clean_url['2'],$clean_url['3']);
				break;
			case "makeNewCategoryForm":
				$this->showMakeNewCategory();
				break;
			case "makeNewCategory":
				$this->makeNewCategory();
				break;
			case "deleteCategory":
				$this->deleteCategory();
				break;
			case "makeNewForumForm":
				$this->showMakeNewForum();
				break;
			case "makeNewForum":
				Forum::makeNewForum($this->post);
				break;
			case "deleteForum":
				$this->deleteForum();
				break;
			case "editCategoryForm":
				$this->showEditCategory();
				break;
			case "editCategory":
				$this->editCategory();
				break;
			case "editForumForm":
				$this->showForumEdit();
				break;
			case "editForum":
				$this->editForum();
				break;
			case "changeCategory"://changing forum category
				$this->changeCategory();
				break;
			case "newThread":
				$this->newThread($clean_url['2']);
				break;
			case "makeNewThread":
				Forum::makeNewThread($clean_url['2'], $this->post);
				break;
			case "thread":
				$this->showThread($clean_url['2'], $clean_url['3']);
				break;
			case "like":
				$this->like($clean_url['2'],$clean_url['3'],$clean_url['4']);
				break;
			case "addPost":
				Forum::addPost($this->post);
				break;
            case "addInscription":
                $this->addInscriptionToDiary();
                break;
            case "addCommentToInscription":
                Diary::addComment($this->post['post_id'],$this->post['comment'],$this->post['author_id']);
                break;
            case "comic":
                WEB_TOON::showComic($clean_url['2']);
                break;
            case "comicAdd":
                WEB_TOON::addNewShow();
                break;
            case "comicAddForm":
                if($this->post['releasedate']){
                    $initials=$this->post['releasedate'];
                }else{
                    $initials=NULL;
                }
                WEB_TOON::addNewForm($this->post['title'],  $this->post['style'], $initials, $this->post['genre'], $this->post['releasedate']);
                break;
            case "profileindex":
                if($clean_url['2']==""){
                    header("Location:http://".ROOT_APP_URL);
                    break;
                }
                WEB_TOON::profileIndex($clean_url['2']);
                break;
            case "changeRangNumber":
                Forum::changeRangNumber($this->post['id'], $this->post['post_amount_needed']);
                break;
            case "changeRangImage":
                Forum::changeRangImage($this->post['id'], $_FILES, $this->post['nazwa'], $this->post['post_amount_needed'], $this->post['special']);
                break;
            case "addRang":
                Forum::addRang($this->post['name'], $_FILES, $this->post['post_amount_needed']);
                break;
            case "deleteRang":
                Forum::deleteRang($this->get['id']);
                break;
            case "gallery":
                Gallery::showGallery($clean_url['2']);//clean_url = ID
                break;
            case "UploadToGallery":
                Gallery::uploadImages($_FILES['file'], $this->post);
                break;
            case "makealbum":
                Gallery::makeAlbum($this->post);
                break;
            case "album":
                Gallery::showAlbum($clean_url['2']);
                break;
            case "updateAlbum":
                Gallery::updateAlbum($this->post);
                break;
            case "deleteAlbum":
                Gallery::deleteAlbum($this->post['id']);//sprawdz, czy trzeba sprawdzac powiazanie albumu z uzytkownikiem siedzacym w session - i tak z reszta innych usuwan updatow i insertow!
                break;
            case "inbox":
                if($clean_url['3']=="") {
                    PW::showInbox( $clean_url[ '2' ] );
                }else{
                    PW::showMessage( $clean_url[ '3' ] );
                }
                break;
            case "newConversation":
                PW::establishNewConversation($this->post);
                break;
            case "writeMessage":
            PW::showWriteMessage();
            break;
            case "ReadMsg":
                PW::showReadMessage($clean_url['2']);
                break;
            case "sendMessage":
                PW::sendMessage($this->post);
                break;
			default:
				$title = "ERROR 404 - ".SITE_NAME;
                eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/error_404.view.php")));
				break;
				//dalsze inputy
		}//TODO: zabezpieczenia rejestracja uzytkonikow ktorzy kupuja moje pluginy

	}

	public function changeCredentials(){
	    $this->verifyUserSession();
        $id = $_SESSION['user']->id;

        //AVATAR CHANGE SECTION
	    if(!empty($_FILES['AvatarFile']['tmp_name'])){

            $target_dir = "uploads/tmp/";
            $target_file = $target_dir . basename($_FILES["AvatarFile"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["AvatarFile"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
// Check file size
            if ($_FILES["AvatarFile"]["size"] > 2000000) {
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
                $name = $_SESSION['user']->username;
                $target_dir = "IMAGES/avatars/" . $id . "/";
                $target_file = $target_dir . basename($name.".".$imageFileType);

                $db = new DB();
                $db -> query("UPDATE users SET avatar = :avatar WHERE id = :id");
                $db -> bind (':id', $_SESSION['user']->id);
                $db -> bind (':avatar', $imageFileType);
                $db -> execute();

                if(!file_exists("IMAGES/avatars/".$id)) { mkdir("IMAGES/avatars/".$id, 0777); }

                if (move_uploaded_file($_FILES["AvatarFile"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["AvatarFile"]["name"]) . " has been uploaded.";

                    $img = new myIMagick();

                    $image = $img->resizeCropFromCenter(120, 120, realpath($target_file));
                    file_put_contents($target_dir . basename($name."_lg".".".$imageFileType), $image);

                    $image = $img->resizeCropFromCenter(50, 50, realpath($target_file));
                    file_put_contents($target_dir . basename($name."_sm".".".$imageFileType), $image);

                    unlink($target_file);

                    header("Location:http://".ROOT_APP_URL."/profile?edit=on");
                    return true;
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

        }

	    //SYGNATURE CHANGE SECTION
       if(!empty($this->post['sygnature'])){//zrobic tu select update z ifem - szybsze
            $db = new DB();
            $db -> query("REPLACE INTO user_settings (id, user_id, setting_name, content) VALUES (:id, :userID, :settingname, :content)");
            $db -> bind(':id', $this->post['sygnaturaID']);
            $db -> bind(':userID', $id);
            $db -> bind(':settingname', 'SYGNATURA');
            $db -> bind(':content', $this->post['sygnature']);

            $db -> execute();

            //echo "dodane do bazy danych";
        }

       header("Location:http://".ROOT_APP_URL."/profile");
    }

	public function addInscriptionToDiary(){
	    $this->verifyUserSession();
        //$parsedPost = textInterpreter::parse($this->post['diary_inscription']); - dodaj po (w widoku) - DODANE


	    $db = new DB();
	    $db -> query("INSERT INTO diary_posts (desired_profile_id, content, author_id) VALUES (:d_p_id, :content, :autor_id)");
	    $db -> bind(':content', $this->post['diary_inscription']);
	    $db -> bind(':autor_id', $this->post['autor_id']);
	    $db -> bind(':d_p_id', $this->post['desired_profile_id']);
	    $db -> execute();

	    //@TODO -> Jesli zrobie z tego myspace'a to Location dac na podstrone usera
        header("Location:http://".ROOT_APP_URL."/profile");
        return false;
    }
	
	public function like($postid, $threadid, $page_id){
		$this->verifyUserSession();
		
		$db = new DB();
		
		$db -> query("SELECT likes FROM f_posts WHERE id = :postid");
		$db -> bind (':postid', $postid);
		$likes = $db -> single();
		
		$db -> query("SELECT * FROM liked WHERE post_id = :postid AND user_id = :userSession");
		$db -> bind (':postid', $postid);
		$db -> bind (':userSession', $_SESSION['user']->id);
		$row = $db -> single();
		
		if($row==false){
			$db -> query("INSERT INTO liked (post_id, user_id) VALUES (:postid, :userid)");
			$db -> bind (':postid', $postid);
			$db -> bind (':userid', $_SESSION['user']->id);
			$db -> execute();
			
			$db -> query("UPDATE f_posts SET likes = :likes WHERE id = :postid");
			$db -> bind (':likes', ++$likes['likes']);
			$db -> bind (':postid', $postid);
			$db -> execute();
		}else{
			$db -> query("DELETE FROM liked WHERE post_id = :postid AND user_id = :userid");
			$db -> bind (':postid', $postid);
			$db -> bind (':userid', $_SESSION['user']->id);
			$db -> execute();
			
			$db -> query("UPDATE f_posts SET likes = :likes WHERE id = :postid");
			$db -> bind (':likes', --$likes['likes']);
			$db -> bind (':postid', $postid);
			$db -> execute();
		}
		
		
		//echo $_SESSION['user']->id ." - ". var_dump($row);
		header("Location:http://".ROOT_APP_URL."/thread/".$threadid."/".$page_id."#".$postid);
		return;
		
	}
	
	public function showThread($thread_id = "error",
                               $page_id = 1){
		// Poprawic url aby bez wpisanej strony wyswietlalo strone 1
		
		$this->verifyUserSession();//zrobic aby wyszukiwalo czy jest yhread, jesli nie to error przy roznych urlach
		
		$title = "forum of ".SITE_NAME;
		$ActiveMenuCategory="MAIN";
		$ActiveMenuSubCategory="forum";
		
		if($thread_id=="error"){
			$title = "ERROR 404 - ".SITE_NAME;
            eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/error_404.view.php")));
			return;
		}
		
		$PHandler = new Forum();
		$posts = $PHandler -> selectPosts($thread_id, $page_id);
		//$pagesnr = $PHandler -> countPagesOfThread($thread_id);
		
		$PHandler -> addView($thread_id);
		$postsnumber = $PHandler->countPosts($thread_id);
		$pagesnbr = ceil($postsnumber['posts_quantity'] / FORUM_PAGE_OFFSET);

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/forum/forum_thread.view.php")));
		return;
	}
	
	public function newThread($forumid){
		$this->verifyUserSession();
		
		$title = "forum of ".SITE_NAME;
		$ActiveMenuCategory="MAIN";
		$ActiveMenuSubCategory="forum";

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/forum/forum_parts/forum_new_thread.php")));
	    return;
	}

	public function forum($forumid = false,
                          $forumpage){//dodac 404, gdy juz bedziesz wyciagal wyniki z bazy
		$this->verifyUserSession();

		if ($forumpage == ""){
		    $forumpage = 1;
        }

		$title = "forum of ".SITE_NAME;
		$ActiveMenuCategory="MAIN";
		$ActiveMenuSubCategory="forum";
		
		$forum = new Forum();
		$threads = $forum -> selectThreads($forumid, $forumpage);
		$ilosctematow = $forum -> countThreads($forumid);
		$paginationpages = ceil($ilosctematow['ilosc'] / FORUM_THREADS_OFFSET);						
		
		if($forumid==false){
            eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/forum/forum_list.view.php")));
		}else{
			/*
			$db = new DB();
			$db->query("SELECT t.*, p.author, p.date, p.name FROM thread t, post p WHERE t.forum_id = :forum_id AND p.id = t.last_post ORDER BY p.sticky DESC, p.date DESC");
			$db->bind(':forum_id', $forumid);
			$threads = $db->resultSet();
			*/
            eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/forum/forum_threads.view.php")));
			return;
		}
	}
		
	public function showForumEdit(){
		$this->isAdmin();
		
		$title = "Edycja Forum - ".SITE_NAME;
		$ActiveMenuCategory="MAIN";
		$ActiveMenuSubCategory="forum";
		
		$forumInfo = $this->takeForumCredentials($this->get['forumid']);
		
		$icon = str_replace("\"", "&quot;", $forumInfo['ikona']);
		
		$forumList = new Forum();					
		$kategorie = $forumList -> pobierzKategorie();
		
		$numerki = $this->forumEditSelectNumbers($this->get['katid']);

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/forum/forum_editForum.view.php")));
	}
	
	public function showEditCategory(){
		$this->isAdmin();
		
		$title = "Edycja Kategorii - ".SITE_NAME;
		$ActiveMenuCategory="MAIN";
		$ActiveMenuSubCategory="forum";
		
		$info = $this->takeCategoryCredentials($this->get['katid']);
		//$info = $info['0'];//tymczasowe rozwiazanie - takeCategory... zwraca podwojna tablice - naprawic to
		
		
		$numerki = $this->categoryMakeSelectNumbers();
		
		//var_dump($info['0']);

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/forum/forum_editCategoryCre.view.php")));
	}
	
	public function showMakeNewForum(){
		$this->isAdmin();
		
		$title = "Make New Forum - ".SITE_NAME;
		$ActiveMenuCategory="MAIN";
		$ActiveMenuSubCategory="forum";
		$underCategory = $this->get['katid'];
		
		$numerki = $this->forumEditSelectNumbers($this->get['katid']);

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/forum/forum_makeNewForum.view.php")));
	}
	
	public function showMakeNewCategory(){
		$this->isAdmin();
		
		$title = "Make New forum Category - ".SITE_NAME;
		$ActiveMenuCategory="MAIN";
		$ActiveMenuSubCategory="forum";
		
		$numerki = $this->categoryMakeSelectNumbers();

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/forum/forum_makeNewCategory.view.php")));
	}
	
	public function showAdminPanel(){
		$title = "Panel Administratora - ".SITE_NAME;
		
		$ActiveMenuCategory="PANEL";
		$ActiveMenuSubCategory="UserList";
		
		$listaUserow = $this->getUsers();
		//$iloscUserow = $this->getUsers(TRUE);

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/adminpanel.php")));
	}

	public function emailActivation($email, $username, $hash){
		
		mail($email, "Aktywacja hasła dla ".$username." - ".SITE_NAME, "Masz 30 minut na zmianę hasła. Kliknij w link:
		http://".ROOT_APP_URL."/activation?hash=".$hash, "From: skorpss@gmail.com" . "\r\n" .
		"CC: somebodyelse@example.com");
		
	}
	
	public function showResendEmailActivation(){
		$this->emailActivation($this->get['email'], $this->get['username'], $this->get['hash']);
		
		header("Location:http://".ROOT_APP_URL."/afterRegistration?email=".$this->get["email"]."&username=".$this->get['username']."&hash=".$this->get['hash']);
		return;		
	}
	
	public function showActivated(){
		$title = "Aktywacja konta - ".SITE_NAME;

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/ifActivated.view.php")));
	}
	
	public function activation(){
		$db = new DB();
		
		
		
		$db -> query('SELECT * FROM user_activation WHERE activation_hash = :hash');
		$db -> bind(':hash', $this->get['hash']);
		$row = $db -> single();
		
		
		if($row){
			
			$db -> query('SELECT is_activated FROM users WHERE username = :username');
			$db -> bind(':username', $row['username']);
			$user_row = $db->single();
			
			if($user_row['is_activated']=="no"){
				$db -> query('UPDATE user_activation SET date_used = now() WHERE username = :username');
				$db -> bind(':username', $row['username']);
				$db -> execute();//dodac przy logowaniu spr activation

				$db -> query('UPDATE users SET is_activated = "yes" WHERE username = :username');
				$db -> bind(':username', $row['username']);
				$db -> execute();
				$affected = $db->rowsAffected();

				if($affected > 0){				
					header("Location:http://".ROOT_APP_URL."/showActivated?pw=done");
					return;
				}//DODAC ELSE Z TEKSTEM "AKTYWACJA NIE UDANA"
			}else{	//AKTYWACJA JUZ WCZESNIEJ PRZEPROWADZONA			
					header("Location:http://".ROOT_APP_URL."/showActivated?pw=notdone");
					return;
			}
		}else{	//ZAMIENIC NA AKTYWACJA NIE UDANA			
			header("Location:http://".ROOT_APP_URL."/showActivated?pw=notdone");
			return;
		}
	}
	
	public function showAfterRegistration(){
		$title = "Registration successful" . " - " . SITE_NAME;

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/afterRegistration.view.php")));
	}
	
	public function showPasswordReset(){
		$this->verifyIfLogged();
		$title = "Reset hasła"." - ".SITE_NAME;

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/passwordReset.view.php")));
	}
	
	public function showForget(){
		$this->verifyIfLogged();
		$title = "Zmiana hasła"." - ".SITE_NAME;

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/forget.view.php")));
	}
	
	public function showLogin($cookies)	{
		$this->verifyIfLogged();
		$title = "Logowanie"." - ".SITE_NAME;
		/*
		if(isset($cookies) AND $cookies['cookie']=="destroy"){
			setcookie('username', '', -5, "/"); setcookie('email', '', -5, "/");
			unset($_COOKIE['username']); unset($_COOKIE['email']);
		}*/
		
		if(isset($_COOKIE['username'])){
            eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/user_suggestion_login.view.php")));
		}else{
            eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/login.view.php")));
			}
		

	}
	public function showRegister()	{
		$this->verifyIfLogged();
		$title = "Rejestracja"." - ".SITE_NAME;

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/register.view.php")));
	}
	public function showDashboard()	{
		$this->verifyUserSession();
		$ActiveMenuCategory = "MAIN";// mozna zrobic to przez this->request
		$ActiveMenuSubCategory = "dashboard";
		
		$title = "Tablica informacyjna"." - ".SITE_NAME;

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/dashboard.view.php")));
	}
	private function showProfile($user)	{
		$this->verifyUserSession();
		$ActiveMenuCategory = "MAIN";
		$ActiveMenuSubCategory="profile";
		$zmienne = $this->get;//@TODO: zamiast przesylac w argumentach mnostwo zmiennych do funkcji z post czy get wyslij tablice, jak tutaj
		
		$title = "Profile"." - ".SITE_NAME;
		//zrobic przyjazny url w .htaccess aby ?user=user wygladal jak profile/user
		//zrobic aby nie zalogowany nie mogl wyswietlic tej strony
		if($user==""){
			$user=$_SESSION['user']->username;
		}
		
		$db = new DB();
		$db->query("SELECT * FROM users WHERE username = :username");
		$db->bind(':username', $user);
		$row = $db->single();
        $db->query("SELECT * FROM user_settings WHERE user_id = :userid AND setting_name = 'SYGNATURA'");
        $db->bind(':userid', $_SESSION['user']->id);
        $usersygnature = $db -> single();

		
		//zrobix tutaj country parser if empty
		if(isset($row['country'])){
			$panstwo = new countryParser($row['country']);
		}else{
			$panstwo = NULL;
		}

        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/profile.view.php")));
	}
	
	private function register()	{
		
		$db = new DB();
		
		if (empty($this->post['username']) || empty($this->post['email']) || empty($this->post['password']) || empty($this->post['password2']) || empty($this->post['lname']) || empty($this->post['fname'])){
			Messages::setError("Zostawiłeś, któreś pole puste");
			header("Location:http://". ROOT_APP_URL ."/registerForm");
			return;
		}
		if ($this->post['password'] !== $this->post['password2']) {
			Messages::setError("Hasła się nie zgadzają");
			header("Location:http://". ROOT_APP_URL ."/registerForm");
			return;
		}
		if ($this->post['terms'] !== "agreed") {
			Messages::setError("Musisz zaakceptować regulamin");			
			header("Location:http://". ROOT_APP_URL ."/registerForm");
			return;
		}
		
		$db -> query('SELECT * FROM users WHERE username = :username');
		$db -> bind(':username', $this->post['username']);
		$row1 = $db -> single();
		
		if($row1){
			Messages::setError("Juz sie zarejestrowal ktos o takim nicku");			
			header("Location:http://". ROOT_APP_URL ."/registerForm");	
			return;
		}
		
		$db -> query('SELECT * FROM users WHERE email = :email');
		$db -> bind(':email', $this->post['email']);
		$row2 = $db -> single();
		
		if($row2){
			Messages::setError("Juz sie zarejestrowal ktos o takim emailu");			
			header("Location:http://". ROOT_APP_URL ."/registerForm");
			return;
		}
		
		if(empty($this->post['newsletter'])){
			$newsletter="no";
		}else{
			$newsletter = "yes";
		}
		
		$HashLinkActivation = hash('sha256', rand(1,getrandmax()));
		
		$db -> query('INSERT INTO user_activation (username, activation_hash) VALUES (:username, :hash)');
		$db -> bind(':username', $this->post['username']);
		$db -> bind(':hash', $HashLinkActivation);
		$db -> execute();
		
		$db->query('INSERT INTO users (username,email,password,imie,nazwisko,newsletter) VALUES(:username,:email,:password,:imie,:nazwisko,:newsletter)');
		$db->bind(':username', $this->post['username']);
		$db->bind(':email', $this->post['email']);
		$db->bind(':password', password_hash($this->post['username'].ENCRYPTION_KEY.$this->post['password'], PASSWORD_BCRYPT, ['cost' => 12]));
		$db->bind(':imie', $this->post['fname']);
		$db->bind(':nazwisko', $this->post['lname']);
		$db->bind(':email', $this->post['email']);
		$db->bind(':newsletter', $newsletter);
		$db->execute();
		
		if($db->lastInsertId()){
			//setcookie("username", $row['username'], time()+3600*24*7);
			//setcookie("email", $row['email'], time()+3600*24*7);
			
			//Messages::setSuccess("Zarejestrowałeś się!");
			$this->emailActivation($this->post['email'], $this->post['username'], $HashLinkActivation);
			header("Location:http://". ROOT_APP_URL ."/afterRegistration?email=".$this->post["email"]."&username=".$this->post['username']."&hash=".$HashLinkActivation);
		}else{
			Messages::setError("Coś poszło nie tak, nie wiadomo co.");	
			header("Location:http://". ROOT_APP_URL ."/registerForm");
		}
	}
	
	private function login(){
		if (empty($this->post['username']) || empty($this->post['password'])){
			Messages::setError("Nie wszystkie pola zostały wypełnione");
			header("Location:http://". ROOT_APP_URL . "/loginForm");
			return;
		}
		
		$db = new DB();
		$db->query("SELECT * FROM users WHERE username = :username");
		$db->bind(':username', $this->post['username']);
		$row = $db->single();
		
		if($row['banned_until'] > date('Y-m-d H-i-s')){
			Messages::setError("Wybacz, ale twoje konto jest zablokowane do: ".$row['banned_until']);
			header("Location:http://". ROOT_APP_URL . "/loginForm");
			return;
		}
		
		if($row['is_activated'] == "no"){
			Messages::setError("Aktywuj konto");
			header("Location:http://". ROOT_APP_URL . "/loginForm");
			return;
		}
		
		if(password_verify($this->post['username'].ENCRYPTION_KEY.$this->post['password'], $row['password']))
		{
			$_SESSION['user'] = new User($row['id'], $row['email'], $row['username'], $row['imie'], $row['nazwisko'], $row['RoleID'], $row['avatar']);

			if($this->post['remember']==true){
                setcookie("username", $row['username'], time()+3600*24*7);
                setcookie("email", $row['email'], time()+3600*24*7);
            }
            setcookie("id", $row['id'], time()+3600*24*30);

			//Messages::setSuccess("Zalogowano poprawnie");
			header("Location:http://". ROOT_APP_URL);
		}else{
			Messages::setError("Nie udało się zalogować");
			header("Location:http://". ROOT_APP_URL ."/loginForm");			
		}
	}
	
	private function logout() {
		unset($_SESSION['user']);
		
		Messages::setSuccess('Wylogowano poprawnie');
		header('Location:https://' . ROOT_APP_URL . "/loginForm");
    }
	
	private function verifyUserSession() {
        if (empty($_SESSION['user'])) {
            header("Location:http://" . ROOT_APP_URL . "/loginForm");
            return;
        }
    }
	
	private function verifyIfLogged() {
		if (isset($_SESSION['user'])) {
            header("Location:http://" . ROOT_APP_URL);
            return;
        }
	}
	
	private function changePassword(){
		$this->verifyUserSession();


		if ( empty($this->post['oldPassword']) || empty($this->post['password']) || empty($this->post['password2']) )
		{
			Messages::setError("Nie wszystkie pola zostały wypełnione.");
			header("Location:http://" . ROOT_APP_URL . "/profile?edit=on");
			return;
		}
		
		//sprawdzanie starego hasla

		$db = new DB();
		$db->query('SELECT password FROM users WHERE id = :username');
		$db->bind(':username', $_SESSION['user']->id);
		$oldPassword = $db->single();	
		$hashPassword = password_hash($_SESSION['user']->username.ENCRYPTION_KEY.$this->post['password'], PASSWORD_BCRYPT, ['cost' => 12]);
				//porownanie starego hasla z haslem w bazie
		if (!password_verify($_SESSION['user']->username.ENCRYPTION_KEY.$this->post['oldPassword'], $oldPassword['password'])){
			Messages::setError("Stare hasło różni się od tego, które posiadasz.");
			header("Location:http://" . ROOT_APP_URL . "/profile?edit=on");
			return;
		}
				//porownanie starego hasla z nowym
		if ($this->post['password'] == $this->post['oldPassword']){
			Messages::setError("Nowe hasło jest identyczne jak stare.");
			header("Location:http://" . ROOT_APP_URL . "/profile?edit=on");
			return;
		}
				//sprawdzenie czy pacjent sie nie pomylil :P
		if ($this->post['password'] != $this->post['password2'])
		{
			Messages::setError("Nowe hasła nie są identyczne.");
			header("Location:http://" . ROOT_APP_URL . "/profile?edit=on");
			return;
		}
		

		$db->query('UPDATE users SET password = :password WHERE id = :id');
		$db->bind(':id', $_SESSION['user']->id);
		$db->bind(':password', $hashPassword);
		$db->execute();
		
		if ($db->rowsAffected() > 0){//sprawdzic czy nie wyswietla ci panelu po zmianie hasla, po zrobieniu zabezpieczen
			Messages::setSuccess("Hasło zmienione. Zaloguj się nowymi danymi.");
            unset($_SESSION['user']);
			header("Location:http://". ROOT_APP_URL ."/loginForm");
		}else{
			Messages::setError("Nie udało się zmienić hasła.");
			header("Location:http://" . ROOT_APP_URL . "/profile?edit=on");			
		}
	}
	
	public function forgot(){
		if (empty($this->post['emailorusername'])){
			Messages::setError("Podaj adres Email lub Nazwe Uzytkownika uzytą do rejestracji.");
			header("Location:http://". ROOT_APP_URL ."/forgetForm");
			return;
		}
		
		$db = new DB();
		$db -> query ("SELECT * FROM users WHERE email = :email OR username = :username");
		$db -> bind (':email', $this->post['emailorusername']);
		$db -> bind (':username', $this->post['emailorusername']);
		$row = $db->single();
		
		if($row){
			$userID = $row['id'];
			$secret = sha1(\microtime());


			$db->query('INSERT INTO reminder (userID, secretKey, validUntile) VALUES (:userID, :secret, now()+ INTERVAL 30 MINUTE)');
			$db->bind(':userID', $userID);
			$db->bind(':secret', $secret);
			$db->execute();
			$id = $db->lastInsertId();

			mail($row['email'], "Reset hasła dla ".$row['username']." - ".SITE_NAME, "Masz 30 minut na zmianę hasła. Kliknij w link:
			http://".ROOT_APP_URL."/passwordResetForm?id=".$id."&secret=".$secret, "From: webmaster@example.com" . "\r\n" .
			"CC: somebodyelse@example.com");

		}
		
		Messages::setSuccess("Sprawdź skrzynke email. Jeśli te dane znajdują się u nas w bazie - dostaniesz wiadomość.");
		header("Location:http://".ROOT_APP_URL."/forgetForm");
	}

	public function resetPassword(){
		
		
		if(empty($this->post['id']) || empty($this->post['secret']) || empty($this->post['password'])){
			
			Messages::setError("Brak Danych");
			header("Location:http://".ROOT_APP_URL."/loginForm");
			return;
		}
		
		if($this->post['password'] !== $this->post['password2']){
			Messages::setError("Nowe hasła się nie zgadzają.");
			header("Location:http://".ROOT_APP_URL."/passwordResetForm");//?id=".$this->post['id']."&secret=".$this->post['secret']
			return;
		}
		
		$db = new DB();
		$db->query("SELECT * FROM reminder WHERE id = :id AND secretKey = :secret AND dateUsed IS NULL AND validUntile > now()");
		$db->bind(':id', $this->post['id']);
		$db->bind(':secret', $this->post['secret']);
		$row = $db->single();
		
		if($row){
			$db->query("SELECT username FROM users WHERE id = :id");
			$db->bind(':id', $row['userID']);
			$user = $db->single();
			
			$db -> query("UPDATE users SET password = :password WHERE id = :id");
			$db -> bind(':id', $row['userID']);
			$db -> bind(':password', password_hash($user['username'].ENCRYPTION_KEY.$this->post['password'], PASSWORD_BCRYPT, ['cost' => 12]));
			$db -> execute();
			
			$db -> query('UPDATE reminder SET dateUsed = now() WHERE id = :id');
			$db -> bind(':id', $this->post['id']);
			$db -> execute();
			
			Messages::setSuccess("Hasło ustawione. Możesz się zalogować.");
			header("Location:http://" . ROOT_APP_URL . "/loginForm");
		}else{
			Messages::setError("Link nieprawidłowy. Hasło nie zostało zmienione.");
			header("Location:http://" . ROOT_APP_URL . "/loginForm");
		}
	}
	/****************************************************************/
	/*/															   /*/
	/*/															   /*/
	/*/						ADMIN	PANEL						   /*/
	/*/															   /*/
	/*/															   /*/
	/****************************************************************/
	
	//Jesli podamy wartosc TRUE dostaniemy ilosc uzytkownikow, jesli FALSE liste
	public function getUsers($ilosc = FALSE){
		if (empty($_SESSION['user']) || !$_SESSION['user']->isAdmin()){
			Messages::setError("Błąd autoryzacji");
			header("Location:http://".ROOT_APP_URL."/loginForm");
			return;
		}			
		$db= new DB();
		$db->query("SELECT * FROM users");
		$results = $db->resultSet();
		$iloscUserow = $db->rowsAffected();
		
		if($ilosc == FALSE)
			return $results;
		else
			return $iloscUserow;
	}
	
	public function adminChangeEmail(){
		if (empty($_SESSION['user']) || !$_SESSION['user']->isAdmin()){
			Messages::setError("Błąd autoryzacji");
			header("Location:http://".ROOT_APP_URL."/loginForm");
			return;
		}	
		
		$db = new DB();
		$db -> query("UPDATE users SET email = :email WHERE id = :id");
		$db->bind(':email', $this->post['email']);
		$db->bind(':id', $this->post['id']);
		$db->execute();
		$pokazWynik = $db->rowsAffected();
		
		if($pokazWynik){
			header("Location:http://".ROOT_APP_URL."/AdminPanel/".$this->post['id']);
			return $pokazWynik;
		}else{
			Messages::setError("Admin: zmiana email nie udana");
			header("Location:http://".ROOT_APP_URL."/AdminPanel");
			return;
		}
		
	}
	
	public function adminChangePayPalAccount(){
		if (empty($_SESSION['user']) || !$_SESSION['user']->isAdmin()){
			Messages::setError("Błąd autoryzacji");
			header("Location:http://".ROOT_APP_URL."/loginForm");
			return;
		}	
		
		$db = new DB();
		$db -> query("UPDATE users SET PayPal = :paypal WHERE id = :id");
		$db->bind(':paypal', $this->post['paypal']);
		$db->bind(':id', $this->post['id']);
		$db->execute();
		$pokazWynik = $db->rowsAffected();
		
		if($pokazWynik){
			header("Location:http://".ROOT_APP_URL."/AdminPanel/".$this->post['id']);
			return $pokazWynik;
		}else{
			Messages::setError("Admin: zmiana konta paypal nie udana");
			header("Location:http://".ROOT_APP_URL."/AdminPanel");
			return;
		}
		
	}
	
	public function searchUserAdmin($anything=""){
			if (empty($_SESSION['user']) || !$_SESSION['user']->isAdmin()){
			Messages::setError("Błąd autoryzacji");
			header("Location:http://".ROOT_APP_URL."/loginForm");
			return;
		}	
		$ActiveMenuCategory="PANEL";
		$ActiveMenuSubCategory="UserList";
		
		$anything = strtolower($anything);
		
		if($anything=="banned"){
				$db = new DB();
				$db -> query("SELECT * FROM users WHERE banned_until > now()");
				$UserResults = $db -> resultSet();

				if(!empty($UserResults)){
					//$ActiveMenuCategory="PANEL";
					//$ActiveMenuSubCategory="UserList";

                    eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/adminpanel.php")));

					return;
				}else{

					Messages::setError("brak wynikow");
                    eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/adminpanel.php")));

					return;				
				}
		}else{
			if($anything!=="")//dodac typy wyszukiwania np. RoleID= aby mozna bylo wyszykiwac po kolumnie
			{
				$db = new DB();
				$db -> query("SELECT * FROM users WHERE id LIKE :anything OR username LIKE :anything OR PayPal LIKE :anything OR imie LIKE :anything OR nazwisko LIKE :anything OR miasto LIKE :anything OR country LIKE :anything OR newsletter LIKE :anything OR is_activated LIKE :anything");
				$db -> bind(':anything', $anything);
				$UserResults = $db -> resultSet();

				if(!empty($UserResults)){
					//$ActiveMenuCategory="PANEL";
					//$ActiveMenuSubCategory="UserList";

                    eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/adminpanel.php")));

					return;
				}else{

					Messages::setError("brak wynikow");
                    eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/adminpanel.php")));

					return;				
				}
			}else{

				header("Location:http://".ROOT_APP_URL."/AdminPanel");
				return;
			}
		}
	}
	
	public function forumEditSelectNumbers($underCategory){
        $this->isAdmin();
       
        $db = new DB();
        $db -> query("SELECT id,kolejnosc FROM forum WHERE kat_id = :UnderCategory ORDER BY kolejnosc ASC");
        $db -> bind(':UnderCategory', $underCategory);
        return $db -> resultSet();
    }
   
    public function categoryMakeSelectNumbers(){
        $this->isAdmin();
       
        $db = new DB();
        $db -> query("SELECT id,kolejnosc FROM forum_category ORDER BY kolejnosc ASC");
        return $db -> resultSet();
    }
	
	public function makeNewCategory(){
		$this->isAdmin();
		
		$db = new DB();
		
		$db -> query("SELECT * FROM forum_category WHERE kolejnosc >= :kolejnosc ORDER BY kolejnosc DESC");
		$db -> bind (':kolejnosc', $this->post['CatNumber']);
		$zmianaKolejnosci = $db->resultSet();
		
		foreach($zmianaKolejnosci as $row){
			$row['kolejnosc']++;
			
			$db -> query("UPDATE forum_Category SET kolejnosc = :kolejnoscNowa WHERE id = :id");
			$db -> bind ('kolejnoscNowa', $row['kolejnosc']);
			$db -> bind (':id', $row['id']);
			$db -> execute();
			
		}
		$db -> query("INSERT INTO forum_category (name, opis, kolejnosc) VALUES (:name, :opis, :kolejnosc)");
		$db -> bind (':name', $this->post['CatName']);
		$db -> bind (':opis', $this->post['CatDesc']);
		$db -> bind (':kolejnosc', $this->post['CatNumber']);
		$db -> execute();
		
		if($db->lastInsertId()){
			Messages::setSuccess("Kategoria Dodana");
			header("Location:http://".ROOT_APP_URL."/forum");
			return;
		}else{
			Messages::setError("Kategoria nie dodana");
			header("Location:http://".ROOT_APP_URL."/forum");
			return;
		}
	}
	
	public function deleteCategory(){
		$this->isAdmin();
		
		$db = new DB();
		
		$db -> query("DELETE FROM forum_category WHERE id = :id");
		$db -> bind (':id', $this->get['id']);
		$db -> execute();
		
		$db -> query("SELECT * FROM forum_category WHERE kolejnosc > :kolejnosc ORDER BY kolejnosc ASC");
		$db -> bind (':kolejnosc', $this->get['kol']);
		$zmianaKolejnosci = $db->resultSet();
		
		if($zmianaKolejnosci){
			foreach($zmianaKolejnosci as $row){
				$row['kolejnosc']--;
				
				$db -> query("UPDATE forum_category SET kolejnosc = :kolejnoscNowa WHERE id = :id");
				$db -> bind (':kolejnoscNowa', $row['kolejnosc']);
				$db -> bind (':id', $row['id']);
				$db -> execute();
			}
		}
		
		header("Location:http://".ROOT_APP_URL."/forum");
		return;
	}
	
	public function makeNewForum(){
		$this->isAdmin();
		
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
		$db -> bind (':name', $this->post['ForumName']);
		$db -> bind (':description', $this->post['ForumDesc']);
		$db -> bind (':icon', $this->post['Icon']);
		$db -> bind (':katid', $this->post['KatID']);
		$db -> bind (':kolejnosc', $this->post['ForumNumber']);
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
	
	public function editForum(){
		$this->isAdmin();
		
		$db = new DB();
		
		if($this->post['ForumNewNumber'] > $this->post['ForumOldNumber']){
			
			$db->query("SELECT id,kolejnosc FROM forum WHERE kolejnosc > :ForumOldNumber AND kolejnosc <= :ForumNewNumber ORDER BY kolejnosc ASC");
			$db->bind(':ForumOldNumber', $this->post['ForumOldNumber']);
			$db->bind(':ForumNewNumber', $this->post['ForumNewNumber']);
			$resultset = $db->resultSet();
			
			foreach($resultset as $row){
				$row['kolejnosc']--;
				
				$db->query("UPDATE forum SET kolejnosc = :NewORDER WHERE id = :ForumID");
				$db->bind(':NewORDER', $row['kolejnosc']);
				$db->bind(':ForumID', $row['id']);
				$db->execute();
				//dodac tutaj msg do logow
			}
			
		}elseif($this->post['ForumNewNumber'] < $this->post['ForumOldNumber']){
			
			$db->query("SELECT id,kolejnosc FROM forum WHERE kolejnosc < :ForumOldNumber AND kolejnosc >= :ForumNewNumber ORDER BY kolejnosc ASC");
			$db->bind(':ForumOldNumber', $this->post['ForumOldNumber']);
			$db->bind(':ForumNewNumber', $this->post['ForumNewNumber']);
			$resultset = $db->resultSet();
			
			foreach($resultset as $row){
				$row['kolejnosc']++;
				
				$db->query("UPDATE forum SET kolejnosc = :NewORDER WHERE id = :ForumID");
				$db->bind(':NewORDER', $row['kolejnosc']);
				$db->bind(':ForumID', $row['id']);
				$db->execute();
				//dodac tutaj msg do logow
			}
		}
		
		$db->query("UPDATE forum SET name = :NewName, description = :NewDesc, ikona = :NewIcon, kolejnosc = :NewOrder WHERE id = :ID");
		$db->bind(':NewName',$this->post['ForumNewName']);
		$db->bind(':NewDesc',$this->post['ForumNewDesc']);
		$db->bind(':NewIcon',$this->post['NewIcon']);
		$db->bind(':NewOrder', $this->post['ForumNewNumber']);
		$db->bind(':ID', $this->post['ForumID']);
		$db->execute();
		//msg do logow
		
		Messages::setSuccess("Forum details changed");
		header("Location:http://".ROOT_APP_URL."/forum");
		return;
	}
	
	public function deleteForum(){
		$this->isAdmin();
		
		$db = new DB();
		
		$db -> query("DELETE FROM forum WHERE id = :id");
		$db -> bind(':id', $this->get['id']);
		$db -> execute();
		
		if($db->rowsAffected()){
		Messages::setSuccess("Forum usuniete");
		}
		
		$db -> query("SELECT * FROM forum WHERE kolejnosc > :kolejnosc_forum ORDER BY kolejnosc ASC");
		$db -> bind (':kolejnosc_forum', $this->get['kolejnosc']);
		$zmianaKolejnosci = $db->resultSet();
		
		if($zmianaKolejnosci){
			foreach($zmianaKolejnosci as $row){
				
				$db -> query("UPDATE forum SET kolejnosc = :kolejnoscNowa WHERE id = :id");
				$db -> bind (':kolejnoscNowa', --$row['kolejnosc']);
				$db -> bind (':id', $row['id']);
				$db -> execute();
			}
		}
		
		header("Location:http://".ROOT_APP_URL."/forum");
		return;
	}
	
	public function changeCategory(){
		$this->isAdmin();
		
		$db = new DB();
		
		$db->query("SELECT kolejnosc FROM forum WHERE id = :ForumID ORDER BY kolejnosc ASC");
		$db->bind(':ForumID', $this->post['ForumID']);
		$ForumKolejnosc = $db->single();
		
		$db->query("SELECT kolejnosc FROM forum WHERE kat_id = :katid ORDER BY kolejnosc DESC LIMIT 1");
		$db->bind(":katid", $this->post['NewKatID']);//new category
		$BiggestForKol = $db->resultSet();
		
		if(empty($BiggestForKol)){ $BiggestForKol['0']['kolejnosc']=0;}
		
		$db -> query("UPDATE forum SET kat_id = :katid, kolejnosc = :NowaKol WHERE id = :ID");
		$db->bind(':katid', $this->post['NewKatID']);//new category
		$db->bind(':NowaKol', ++$BiggestForKol['0']['kolejnosc']);//last record of order in new cat
		$db->bind(':ID', $this->post['ForumID']);
		$db->execute();
		
		if($db->rowsAffected()){
			Messages::setSuccess("Kategoria zmieniona");
		}else{
			Messages::setError("Nie dokonano żadnych zmian");
		}
		
		$db->query("SELECT id, kolejnosc FROM forum WHERE kat_id = :katid AND kolejnosc > :ForumKolejnosc ORDER BY kolejnosc ASC");
		$db->bind(":katid", $this->post['OldKatID']);
		$db->bind(":ForumKolejnosc", $ForumKolejnosc['kolejnosc']);
		$wyniki = $db->resultSet();
		
		foreach($wyniki as $row){
			
                $db -> query("UPDATE forum SET kolejnosc = :kolejnoscNowa WHERE id = :id");
                $db -> bind(':kolejnoscNowa', --$row['kolejnosc']);
                $db -> bind(':id', $row['id']);
                $db -> execute();
            }
		
		header("Location:http://".ROOT_APP_URL."/forum");
		return;
		
	}

    public static function isAdmin(){
        if($_SESSION['user']->isAdmin()){
            return true;
        }else{
            header("Location:http://".ROOT_APP_URL);
            return;
        }
    }
   
    public function editCategory(){
        $this->isAdmin();
       
        $db = new DB();
       
        //zmiana kolejnosci - tylko!
        if($this->post["CatNewNumber"] > $this->post["CatOldNumber"]){
            $db -> query("SELECT id,kolejnosc FROM forum_category WHERE kolejnosc > :CatOldNumber AND kolejnosc <= :CatNewNumber ORDER BY kolejnosc ASC");
            $db -> bind (':CatOldNumber', $this->post["CatOldNumber"]);
            $db -> bind (':CatNewNumber', $this->post["CatNewNumber"]);
            $wyniki = $db -> resultSet();
           
            foreach($wyniki as $kategoria){
                $kategoria['kolejnosc']--;
 
                $db -> query("UPDATE forum_category SET kolejnosc = :kolejnoscNowa WHERE id = :id");
                $db -> bind(':kolejnoscNowa', $kategoria['kolejnosc']);
                $db -> bind(':id', $kategoria['id']);
                $db->execute();
            }
           
            $db -> query("UPDATE forum_category SET name = :NewName, opis = :NewDesc, kolejnosc = :CatNewNumber WHERE id = :CatId");
            $db -> bind (':NewName', $this->post['CatNewName']);
            $db -> bind (':NewDesc', $this->post['CatNewDesc']);
            $db -> bind (':CatNewNumber', $this->post['CatNewNumber']);
            $db -> bind (':CatId', $this->post['CatId']);
            $db -> execute();
           
        }elseif($this->post["CatNewNumber"] < $this->post["CatOldNumber"]){
            $db -> query("SELECT id,kolejnosc FROM forum_category WHERE kolejnosc < :CatOldNumber AND kolejnosc >= :CatNewNumber ORDER BY kolejnosc DESC");
            $db -> bind (':CatOldNumber', $this->post["CatOldNumber"]);
            $db -> bind (':CatNewNumber', $this->post["CatNewNumber"]);
            $wyniki = $db -> resultSet();
           
            foreach($wyniki as $kategoria){
                $kategoria['kolejnosc']++;
 
                $db -> query("UPDATE forum_category SET kolejnosc = :kolejnoscNowa WHERE id = :id");
                $db -> bind(':kolejnoscNowa', $kategoria['kolejnosc']);
                $db -> bind(':id', $kategoria['id']);
                $db->execute();
            }
           
            $db -> query("UPDATE forum_category SET name = :NewName, opis = :NewDesc, kolejnosc = :CatNewNumber WHERE id = :CatId");
            $db -> bind (':NewName', $this->post['CatNewName']);
            $db -> bind (':NewDesc', $this->post['CatNewDesc']);
            $db -> bind (':CatNewNumber', $this->post['CatNewNumber']);
            $db -> bind (':CatId', $this->post['CatId']);
            $db -> execute();
        }else{
            $db -> query("UPDATE forum_category SET name = :NewName, opis = :NewDesc WHERE id = :CatId");
            $db -> bind (':NewName', $this->post['CatNewName']);
            $db -> bind (':NewDesc', $this->post['CatNewDesc']);
            $db -> bind (':CatId', $this->post['CatId']);
            $db -> execute();
        }
        Messages::setSuccess("Kategoria zmieniona");
        header("Location:http://".ROOT_APP_URL."/forum");
    }
	
	public function takeCategoryCredentials($katid){//pokazuje informacje o kategorii w punkcie view edytowanej kategorii		
		$db1 = new DB();
		
		$db1 -> query("SELECT * FROM forum_category WHERE id = :katid");
		$db1 -> bind (':katid', $katid);
		return $db1 -> single();
	}
	
	public function takeForumCredentials($forumid){
		$db = new DB();
		
		$db -> query ("SELECT * FROM forum WHERE id = :forumid");
		$db -> bind (':forumid', $forumid);
		return $db -> single();
	}
	
	public static function debug($tresc){
		$debug = new Debugger($tresc, date('d-m-Y H-i-s'));
		$debug -> dodaj();
	}
	
	public function showvardump($tresc){
		require("vardump.php");
		//die();
	}
}