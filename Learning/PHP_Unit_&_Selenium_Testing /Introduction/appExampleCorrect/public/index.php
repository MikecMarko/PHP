<?php

use appExampleCorrect\Greeting;
use appExampleCorrect\SQLiteUserRepository;

require '../vendor/autoload.php';

$id = $_GET['id'] ?? null;
$current_hour = date("G");

$greeting = new Greeting(new SQLiteUserRepository());
$greeting->setCurrentHour($current_hour);

echo $greeting->greetTheUser($id);

