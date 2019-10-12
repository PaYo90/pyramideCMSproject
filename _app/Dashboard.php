<?php

namespace Aplikacja;

class Dashboard
{
	private $request;
	private $post;
	private $get;
	
	public function __construct($request){
		$requestString = explode("?", $request);
		$this->request = empty($requestString) ? $request : $requestString[0];
	}
	
	public function ProcessRequest()
	{
		if(!$this->request)
		{
			return;
			//echo "cos sie zjebalo";
		}
		
		$this -> post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$this -> get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		
		$urlArray = explode("/", $this->request);

		$clean_url = array_filter($urlArray);

		if(empty($clean_url['1'])){ $clean_url['1']=""; }
		if(empty($clean_url['2'])){ $clean_url['2']=""; }
		
		switch ($clean_url['1'])
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
				$title = "forum of ".SITE_NAME;
				$ActiveMenuCategory="MAIN";
				$ActiveMenuSubCategory="forum";
				require("app/views/forum/forum_list.view.php");
				break;
			case "makeNewCategory":
				$this->makeNewCategory();
				break;
			case "deleteCategory":
				$this->makeNewCategory();
				break;
			default:
				$title = "ERROR 404 - ".SITE_NAME;
				require("app/views/error_404.view.php");
				break;
				//dalsze inputy
		}

	}
	
	public function showAdminPanel(){
		$title = "Panel Administratora - ".SITE_NAME;
		
		$ActiveMenuCategory="PANEL";
		$ActiveMenuSubCategory="UserList";
		
		$listaUserow = $this->getUsers();
		//$iloscUserow = $this->getUsers(TRUE);

		require("app/views/adminpanel.php");
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
		
		require("app/views/ifActivated.view.php");
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
		
		require("app/views/afterRegistration.view.php");
	}
	
	public function showPasswordReset(){
		$this->verifyIfLogged();
		$title = "Reset hasła"." - ".SITE_NAME;
		
		require("app/views/passwordReset.view.php");
	}
	
	public function showForget(){
		$this->verifyIfLogged();
		$title = "Zmiana hasła"." - ".SITE_NAME;
			
		require("app/views/forget.view.php");
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
		require("app/views/user_suggestion_login.view.php");			
		}else{
		require("app/views/login.view.php");
		}
		

	}
	public function showRegister()	{
		$this->verifyIfLogged();
		$title = "Rejestracja"." - ".SITE_NAME;
		
		require("app/views/register.view.php");
	}
	public function showDashboard()	{
		$this->verifyUserSession();
		$ActiveMenuCategory = "MAIN";// mozna zrobic to przez this->request
		$ActiveMenuSubCategory = "dashboard";
		
		$title = "Tablica informacyjna"." - ".SITE_NAME;
		
		require("app/views/dashboard.view.php");
	}
	private function showProfile($user)	{
		$this->verifyUserSession();
		$ActiveMenuCategory = "MAIN";
		$ActiveMenuSubCategory="profile";
		
		
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
		
		//zrobix tutaj country parser if empty
		if(isset($row['country'])){
			$panstwo = new countryParser($row['country']);
		}else{
			$panstwo = NULL;
		}
		
		require("app/views/profile.view.php");
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
			$_SESSION['user'] = new User($row['id'], $row['email'], $row['username'], $row['imie'], $row['nazwisko'], $row['RoleID']);
			setcookie("username", $row['username'], time()+3600*24*7);
			setcookie("email", $row['email'], time()+3600*24*7);



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
		$db->query('SELECT password FROM users WHERE username = :username');
		$db->bind(':username', $_SESSION['user']->username);
		$oldPassword = $db->single();	
		$hashPassword = password_hash($_SESSION['user']->username.ENCRYPTION_KEY.$this->post['password'], PASSWORD_BCRYPT, ['cost' => 12]);
		$hashOldPassword = password_hash($_SESSION['user']->username.ENCRYPTION_KEY.$this->post['oldPassword'], PASSWORD_BCRYPT, ['cost' => 12]);
				//porownanie starego hasla z haslem w bazie
		if ($oldPassword["password"] !== $hashOldPassword){
			Messages::setError("Stare hasło różni się od tego, które posiadasz.");
			header("Location:http://" . ROOT_APP_URL . "/profile?edit=on");
			return;
		}
				//porownanie starego hasla z nowym
		if ($hashPassword == $hashOldPassword){
			Messages::setError("Nowe hasło jest identyczne jak stare.");
			header("Location:http://" . ROOT_APP_URL . "/profile?edit=on");
			return;
		}
				//sprawdzenie czy pacjent sie nie pomylil :P
		if ($this->post['password'] !== $this->post['password2'])
		{
			Messages::setError("Nowe hasła nie są identyczne.");
			header("Location:http://" . ROOT_APP_URL . "/profile?edit=on");
			return;
		}
		

		$db->query('UPDATE user SET password = :password WHERE id = :id');
		$db->bind(':id', $_SESSION['user']->id);
		$db->bind(':password', $hashPassword);
		$db->execute();
		
		if ($db->rowsAffected() > 0){//sprawdzic czy nie wyswietla ci panelu po zmianie hasla, po zrobieniu zabezpieczen
			Messages::setSuccess("Hasło zmienione. Zaloguj się nowymi danymi.");
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

					require("app/views/adminpanel.php");
					return;
				}else{

					Messages::setError("brak wynikow");
					require("app/views/adminpanel.php");
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

					require("app/views/adminpanel.php");
					return;
				}else{

					Messages::setError("brak wynikow");
					require("app/views/adminpanel.php");
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
        $db -> query("SELECT id,kolejnosc FROM forums WHERE kat_id = :UnderCategory ORDER BY kolejnosc ASC");
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
		
	}
	
	public function deleteCategory(){
		
	}
	
	public function makeNewForum(){
		
	}
	
	public function deleteForum(){
		
	}
   
    public function changeKategory(){
        $this->isAdmin();
       
        $db = new DB();
       
        //zmiana kolejnosci - tylko!
        if($this->post["CatNewNumber"]>$this->post["CatOldNumber"]){
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
           
        }elseif($this->post["CatNewNumber"]<$this->post["CatOldNumber"]){
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
}