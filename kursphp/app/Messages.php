<?php

namespace Wesel\Shortener;

class Messages
{
    public static function setError($message)
    {
        $_SESSION['messages']['error'] = $message;

        $db = new DB();
        $db->query("INSERT INTO `log` (`action`, `level`, `userId`) VALUES (':message', 'ERROR', ':userId'");
        $db->bind(':message', $message);
        $db->bind(':userId', $_SESSION['user']->id);
        $db->execute();
    }

    public static function setSuccess($message)
    {
        $_SESSION['messages']['success'] = $message;

        $db = new DB();
        $db->query("INSERT INTO `log` (`action`, `level`, `userId`) VALUES (':message', 'SUCCESS', ':userId'");
        $db->bind(':message', $message);
        $db->bind(':userId', $_SESSION['user']->id);
        $db->execute();
    }

    public static function flashMessages()
    {
        if (isset($_SESSION['messages']['error']))
        {
			echo '<div class="row"><div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$_SESSION['messages']['error'].'</div></div>';
            unset($_SESSION['messages']['error']);
        }

        if (isset($_SESSION['messages']['success']))
        {
			echo '<div class="row"><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$_SESSION['messages']['success'].'</div></div>';
            unset($_SESSION['messages']['success']);
        }
    }
}