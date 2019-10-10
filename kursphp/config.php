<?php

// Define DB Params
define("DB_HOST", "***");
define("DB_USER", "***");
define("DB_PASS", "***");
define("DB_NAME", "***");

// Define URL
define("ROOT_LANDING_URL", "localhost");
define("ROOT_APP_URL", "app.localhost");
define("ROOT_SHORT_URL", "riy.pl");

foreach (glob("app/*.php") as $filename) {
    include $filename;
}

include ("RequestProcessor.php");