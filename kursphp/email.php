<?php

$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$message = htmlspecialchars(trim($_POST['message']));

$to = "marcinwesel@gmail.com";

if (empty($name) || empty($email) || empty($message))
{
    echo "Nie wszystkie pola zostały wypełnione";
}
else
{
    $mail = "$name, z mailem: $email, napisał: $message";

    if (mail($to, "Wiadomość skracamy.com", $mail))
    {
        echo "Wiadomość wysłana poprawnie. Pozostajemy w kontakcie.";
    }
    else
    {
        echo "Błąd przy wysyłaniu wiadomości.";
    }
}

echo "<br/><br/><a href='https://skracamy.com'>Wróć na stronę główną</a>";
?>