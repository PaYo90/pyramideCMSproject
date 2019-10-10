<?php

namespace Wesel\Shortener;

class Dashboard
{
    private $request;
    private $post;
    private $get;

    public function __construct($request) {
        $requestString = \explode("?", $request);
        $this->request = empty($requestString) ? $request : $requestString[0];
    }

    public function processRequest() {
        if (!$this->request) {
            return;
        }

		$this->post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$this->get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        switch ($this->request)
        {
            case "/":
                $this->showDashboard();
                break;
            case "/kursphp/loginForm":
                require("app/views/login.view.php");
                break;
            case "/kursphp/registerForm":
                require("app/views/register.view.php");
                break;
            case "/remindForm":
                require("app/views/remind.view.php");
                break;
            case "/newPasswordForm":
                require("app/views/passwordReset.view.php");
                break;          
            case "/login":
                $this->login();
                break;
            case "/logout":
                $this->logout();
                break;
            case "/register":
                $this->register();
                break;
            case "/remind":
                $this->remind();
                break;            
            case "/changePasswordForm":
                $this->verifyUserSession();
                require("app/views/changePassword.view.php");
                break;
            case "/changePassword":
                $this->changePassword();
                break;
            case "/reset":
                $this->resetPassword();
                break;
            case "/newUrl":
                $this->verifyUserSession();
                require("app/views/newUrl.view.php");
                break;
            case "/addUrl":
                $this->addUrl($this->post['url']);
                break;            
            case "/deleteUrl":
                $this->deleteUrl($this->get['id']);
                break;
            case "/users":
                $this->showUsers();
                break;
            case "/banUser":
                $this->banUser($this->get['id'], true);
                break;            
            case "/unlockUser":
                $this->banUser($this->get['id'], false);
                break;
default:
              require("app/views/register.view.php");
                break;
     
        }
    }

    private function showUsers() {
        $this->verifyIsAdmin();

        $users = $this->getUsers();

        require("app/views/users.view.php");
    }

    private function addUrl($url) {
        $this->verifyUserSession();

        $shortener = new Shortener();
        $shortUrl = $shortener->createShortUrl($url);
        
        if ($shortUrl)
        {
            Messages::setSuccess("Link utworzony: $shortUrl");  
        }
        else
        {
            Messages::setError("Błąd podczas dodawania linku");
        }

        header("Location:https://" . ROOT_APP_URL);
    }

    private function banUser($id, $isBan) {
        $this->verifyIsAdmin();
        
        $db = new DB();
        $db->query('UPDATE user SET isBanned = :isBan WHERE id = :id');
        $db->bind(':id', $id);
        $db->bind(':isBan', $isBan ? 1 : 0);
        $db->execute();
        
        if($db->rowsAffected() > 0){
            
            Messages::setSuccess("Dostęp użytkownika zmieniony.");
        }
        else
        {
            Messages::setError("Nie udało się zmienić użytkownika.");
        }
        
        header("Location:https://" . ROOT_APP_URL . "/users");
    }

    private function deleteUrl($id) {
        $this->verifyUserSession();

        $shortener = new Shortener();
        if ($shortener->deleteUrl($id))
        {
            Messages::setSuccess("Link usunięty");            
        }
        else
        {
            Messages::setError("Błąd podczas usuwania linku"); 
        }
        
        header("Location:https://" . ROOT_APP_URL);
    }

    private function showDashboard() {
        $this->verifyUserSession();

        $urls = $this->getMyUrls();
        $clicks = 0;
        $count = count($urls);

        foreach ($urls as $url)
        {
            $clicks += $url['clicks'];
        }

        require("app/views/dashboard.view.php");
    }

    private function getMyUrls() {
        $this->verifyUserSession();

        $db = new DB();
        $db->query("SELECT * FROM url WHERE userId = :userId");
        $db->bind(':userId', $_SESSION['user']->id);
        $results = $db->resultSet();
        return $results;
    }

    private function getUsers() {
        $this->verifyIsAdmin();
        $db = new DB();
        $db->query("SELECT * FROM user;");
        $results = $db->resultSet();
        return $results;
    }

    private function login() {
        if (empty($this->post['email']) || empty($this->post['password']))
        {
            Messages::setError("Nie wszystkie pola zostały wypełnione");
            header("Location:https://" . ROOT_APP_URL . "/loginForm");
            return;
        }

        $db = new DB();
        $db->query("SELECT * FROM user WHERE email = :email AND password = :pass AND isBanned = 0");
        $db->bind(':email', $this->post['email']);
        $db->bind(':pass', hash('sha256', $this->post['email'] . $this->post['password']));
        $row = $db->single();

        if($row)
        {
            $_SESSION['user'] = new User($row['id'], $row['email'], $row['roleId']);
                
            Messages::setSuccess("Zalogowano poprawnie.");
            header("Location:https://" . ROOT_APP_URL);
        }
        else
        {
            Messages::setError("Nie udało się zalogować.");
            header("Location:https://" . ROOT_APP_URL . "/loginForm");
        }
    }
    
    private function register() {
        if (empty($this->post['email']) || empty($this->post['password']) || empty($this->post['password2']))
        {
            Messages::setError("Nie wszystkie pola zostały wypełnione.");
            header("Location:https://" . ROOT_APP_URL . "/registerForm");
            return;
        }

        if ($this->post['password'] !== $this->post['password2'])
        {
            Messages::setError("Hasła nie są identyczne.");
            header("Location:https://" . ROOT_APP_URL . "/registerForm");
            return;
        }
        
        $db = new DB();
        $db->query('INSERT INTO user (email, password) VALUES(:email, :password)');
        $db->bind(':email', $this->post['email']);
        $db->bind(':password', hash('sha256', $this->post['email'] . $this->post['password']));
        $db->execute();
        
        if($db->lastInsertId()){
            
            Messages::setSuccess("Konto założone. Możesz się zalogować.");
            header("Location:https://" . ROOT_APP_URL . "/loginForm");
        }
        else
        {
            Messages::setError("Nie udało się założyć tego konta.");
            header("Location:https://" . ROOT_APP_URL . "/registerForm");
        }
    }

    private function changePassword() {
        $this->verifyUserSession();

        if (empty($this->post['oldPassword']) || empty($this->post['password']) || empty($this->post['password2']))
        {
            Messages::setError("Nie wszystkie pola zostały wypełnione.");
            header("Location:https://" . ROOT_APP_URL . "/changePasswordForm");
            return;
        }

        if ($this->post['password'] !== $this->post['password2'])
        {
            Messages::setError("Nowe hasła nie są identyczne.");
            header("Location:https://" . ROOT_APP_URL . "/changePasswordForm");
            return;
        }
        
        $db = new DB();
        $db->query('UPDATE user SET password = :password WHERE id = :id');
        $db->bind(':id', $_SESSION['user']->id);
        $db->bind(':password', hash('sha256', $_SESSION['user']->email . $this->post['password']));
        $db->execute();
        
        if($db->rowsAffected() > 0){
            
            Messages::setSuccess("Hasło zmienione. Zaloguj się nowymi danymi.");
            header("Location:https://" . ROOT_APP_URL . "/loginForm");
        }
        else
        {
            Messages::setError("Nie udało się zmienić hasła.");
            header("Location:https://" . ROOT_APP_URL);
        }
    }

    private function logout() {
		unset($_SESSION['user']);
		Messages::setSuccess('Wylogowano poprawnie');
		// Redirect
		header('Location:https://' . ROOT_APP_URL . "/loginForm");
    }

    private function remind() {
        if (empty($this->post['email']))
        {
            Messages::setError("Podaj adres e-mail użyty do rejestracji");
            header("Location:https://" . ROOT_APP_URL . "/remindForm");
            return;
        }

        $db = new DB();
        $db->query("SELECT * FROM user WHERE email = :email");
        $db->bind(':email', $this->post['email']);
        $row = $db->single();

        if($row)
        {
            $userId = $row['id'];
            $secret = sha1(\microtime());
            $db->query('INSERT INTO `reminder` (`userId`, `secretKey`, `validUntil`) 
                VALUES (:userId, :secret, now() + INTERVAL 30 MINUTE)');
            $db->bind(':userId', $userId);
            $db->bind(':secret', $secret);
            $db->execute();
            $id = $db->lastInsertId();

            mail($this->post['email'], "Reset hasła", "Masz 30 minut na zmianę hasła. Link: 
                https://" . ROOT_APP_URL . "/newPasswordForm?id=$id&secret=$secret");
        }

        Messages::setSuccess("Sprawdź swoją skrzynkę e-mail.");
        header("Location:https://" . ROOT_APP_URL . "/loginForm");
    }

    private function resetPassword() {
        if (empty($this->post['id']) || empty($this->post['secret']) || empty($this->post['password']))
        {
            Messages::setError("Brak danych");
            header("Location:https://" . ROOT_APP_URL . "/loginForm");
            return;
        }

        if ($this->post['password'] !== $this->post['password2'])
        {
            Messages::setError("Nowe hasła nie są identyczne. Kliknij w link jeszcze raz.");
            header("Location:https://" . ROOT_APP_URL . "/loginForm");
            return;
        }
        
        $db = new DB();
        $db->query("SELECT * FROM reminder WHERE id = :id AND secretKey = :secret AND dateUsed IS NULL AND validUntil > now()");
        $db->bind(':id', $this->post['id']);
        $db->bind(':secret', $this->post['secret']);
        $row = $db->single();

        if($row)
        {
            $db->query("SELECT email FROM user WHERE id = :id");
            $db->bind(':id', $row['userId']);
            $user = $db->single();

            $db->query('UPDATE user SET password = :password WHERE id = :id');
            $db->bind(':id', $row['userId']);
            $db->bind(':password', hash('sha256', $user['email'] . $this->post['password']));
            $db->execute();

            $db->query('UPDATE`reminder` SET dateUsed = now() WHERE id = :id');
            $db->bind(':id', $this->post['id']);
            $db->execute();

            Messages::setSuccess("Hasło ustawione. Możesz się zalogować.");
            header("Location:https://" . ROOT_APP_URL . "/loginForm");
        }
        else
        {
            Messages::setError("Link nieprawidłowy. Hasło nie zostało ustawione.");
            header("Location:https://" . ROOT_APP_URL . "/loginForm");
        }

    }

    private function verifyIsAdmin() {
        if (empty($_SESSION['user']) || !$_SESSION['user']->isAdmin())
        {
            Messages::setError("Błąd autoryzacji");
            header("Location:https://" . ROOT_APP_URL . "/loginForm");
            exit();
        }
    }

    private function verifyUserSession() {
        if (empty($_SESSION['user'])) {
            Messages::setError("Musisz się zalogować");
            header("Location:https://" . ROOT_APP_URL . "/loginForm");
            return;
        }
    }
}
