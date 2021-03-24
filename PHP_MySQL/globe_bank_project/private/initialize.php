<?php
ob_start(); // output buffering is turned on
//Assigning file paths to PHP constants
//_FILE_ returns the current path to this file
// dirname() returns the pathh to the parent directory
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

// We need to assign the root URL to a PHP constant
// We dont need to include a domain
// Use the same document root as webserver
// Can set a hardcoded value:
// define ("WWW_ROOT", '/~user/webprojectname/public');
// define ("WWW_ROOT", '');
// We can dinamically find everything in URL up to "/public"

// we use SCRIPT_NAME to get the path to the current script, we search for a '/public'
// and we add 7 to not count /public itself.

// Then we use substr to get the root name of the document
// again we use the path to the current script then we extract all from the beginning to the starting position
// of a file we need

// Then we define the "WWW_ROOT" constant.

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

require_once "functions.php";