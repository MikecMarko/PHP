<!DOCTYPE html>
<html lang="en">

<head>
    <title>Globe Bank<?php if(isset($page_title)) { echo '- ' . h($page_title); } ?><?php 
    if(isset($preview) && $preview) {echo '  [PREVIEW]';}?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/public.css') ?>">
</head>

<body>

    <header>
        <h1>
            <a href="<?php echo url_for('/index.php') ?>">
                <img src="<?php echo url_for('/images/gbi_logo.png') ?>" width="298" height="71" alt="">
            </a>
        </h1>
    </header>