<?php

define("SITE_NAME", "Rechniewskiego-United"); // site name
define("ENCRYPTION_KEY", "!*&%#(^%*#");//better not change that after first User registration

define("DEVELOPER_MODE", "ON");//shows sessions and stuff ON/OFF

// Define DB Params
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "tajemnica");

//Define URL
define("ROOT_LANDING_URL", "localhost");
define("ROOT_APP_URL", "app.localhost");
define("ROOT_SHORT_URL", "inny_url.pl");

foreach (glob ("app/*.php") as $filename) {
	include $filename ;
}

include_once("RequestProcessor.php");

?>