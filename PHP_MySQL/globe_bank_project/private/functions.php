<?php
function url_for($script_path)
{
// add the leading '/' if not present
    // represents the path to the root of the folder
    if ($script_path[0] != '/') {
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}

// Since we will be encoding often in the project we made a shorter functions which will serve the
// same purpose as urlencode() and rawurlencode().

function u($string = "")
{
    return urlencode($string);
}

function u_raw($string = "")
{
    return rawurlencode($string);
}

// Short function for HTML encoding

function h($string = "")
{
    return htmlspecialchars($string);
}

// Functions for errors / Headers

function error_404()
{
    header($_SERVER["SERVER_PROTOCOL"] . "404 Not Found");
    exit();
}

function error_500()
{
    header($_SERVER["SERVER_PROTOCOL"] . "500 Internal Server Error");
    exit();
}