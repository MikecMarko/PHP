<?php
//Assigning file paths to PHP constants
//_FILE_ returns the current path to this file
// dirname() returns the pathh to the parent directory
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');
require_once "functions.php";