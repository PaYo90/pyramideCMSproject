<?php
$userid = $_COOKIE['id'];

use Aplikacja\DB;

if($userid AND true) {//check if users are online (consume loot of server power) TRUE for on FALSE for OFF
    include_once ("../../DBconfig.php");

    include_once ("../ModelsAndControllers/DB.php");

    $db = new DB();
    $db->query( "UPDATE users SET last_online = now() WHERE id = :session" );
    $db->bind( ':session', $userid );
    $db->execute();
}