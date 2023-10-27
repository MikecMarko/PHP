<?php

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->get('/', function () {
    echo 'Welcome to my slim app';
});
$app->run();

