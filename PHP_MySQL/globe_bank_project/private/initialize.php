<?php
//Assigning file paths to PHP constants
//_FILE_ returns the current path to this file
// dirname() returns the pathh to the parent directory
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');
require_once "functions.php";

// We need to assign the root URL to a PHP constant
// We dont need to include a domain
// Use the same document root as webserver
// Can set a hardcoded value:
// define ("WWW_ROOT", '/~user/webprojectname/public');
// define ("WWW_ROOT", '');
// We can dinamically find everything in URL up to "/public"

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);