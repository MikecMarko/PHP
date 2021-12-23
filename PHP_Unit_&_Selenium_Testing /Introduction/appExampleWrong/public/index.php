<?php

use App\Greeting;

require '../vendor/autoload.php';

$greeting = new Greeting();
$id = $_GET['id'] ?? null;
echo $greeting->greetTheUser($id);

