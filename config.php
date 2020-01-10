<?php

define("SITE_NAME", "Rechniewskiego-United"); // site name
define("ENCRYPTION_KEY", "!*&%#(^%*#");//better not change that after first User registration
define("FORUM_PAGE_OFFSET", 10);//posts per forum page
define("FORUM_THREADS_OFFSET", 5);//threads per list page


define("DEVELOPER_MODE", "ON");//shows sessions and stuff ON/OFF

// Define DB Params
include_once ("DBconfig.php");

//Define URL
define("ROOT_LANDING_URL", "localhost");
define("ROOT_APP_URL", "app.localhost");
define("ROOT_SHORT_URL", "inny_url.pl");



foreach (glob ("app/ModelsAndControllers/*.php") as $filename) {
	include $filename ;
}
foreach (glob ("app/site_settings/*.php") as $filename) {
    include $filename ;
}
foreach (glob ("app/plugins/*.php") as $filename) {
    include $filename ;
}

include_once("RequestProcessor.php");

?>