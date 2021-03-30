<?php
define("DB_SERVER", "localhost");
define("DB_USER", "marko");
define("DB_PASS", "password");
define("DB_NAME", "globe_bank");

function db_connect()
{
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    return $connection;
}

function db_disconnect($connection)
{
    if (isset($connection)) {
        mysqli_close($connection);}
}