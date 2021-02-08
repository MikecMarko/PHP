
<!doctype html>
<html>
    <head>
        <title>Planer arhitekture stambenih objekata</title>
        <meta charset="UTF-8" >
        <link type="text/css" href="stil.css" rel="stylesheet">
    </head>

<body>

<?php session_start() ?>
    
    <div class="izbornik_stil">
    <br>
    <h2 style="color: white;">Planer arhitekture stambenih objekata</h2>

        
    <a class="izbornik_poveznica" href="index.php">Početna stranica</a>
    <a class="izbornik_poveznica" href="o_autoru.html">O autoru</a>
    
    <?php 

    if(!isset($_SESSION['tip_id']))
    {
        echo '<a class="izbornik_poveznica" href="prijava.php">Prijava</a>';
        echo '<a class="izbornik_poveznica" href="kategorije_neregistriran.php">Kategorije i uk. br.</a>';
    }

    if(isset($_SESSION['tip_id']))
    {
        echo '<a class="izbornik_poveznica" href="odjava.php">Odjava</a>';
        echo '<a class="izbornik_poveznica" href="kategorije_neregistriran.php">Kategorije i uk. br.</a>';
    }
    
    if(isset($_SESSION['tip_id']))
    {

        switch($_SESSION['tip_id'])
        {
            case 2:
                echo '<a class="izbornik_poveznica" href="zahtjev_novi_projekt.php">Zahtjev za novi projekt</a>';
                echo '<a class="izbornik_poveznica" href="moji_zahtjevi.php">Moji zahtjevi</a>';
            break;

            case 1:
                echo '<a class="izbornik_poveznica" href="zahtjev_novi_projekt.php">Zahtjev za novi projekt</a>';
                echo '<a class="izbornik_poveznica" href="moji_zahtjevi.php">Moji zahtjevi</a>';
                echo '<a class="izbornik_poveznica" href="zahtjevi_korisnika_za_projektnim_planom.php">Zahtjevi korisnika za projektnim planom</a>';
            break;

            case 0:
                echo '<a class="izbornik_poveznica" href="zahtjev_novi_projekt.php">Zahtjev za novi projekt</a>';
                echo '<a class="izbornik_poveznica" href="moji_zahtjevi.php">Moji zahtjevi</a>';
                echo '<a class="izbornik_poveznica" href="zahtjevi_korisnika_za_projektnim_planom.php">Zahtjevi korisnika za projektnim planom</a>';
                echo '<br><br><a class="izbornik_poveznica" href="korisnici.php">Korisnici sustava</a>';
                echo '<a class="izbornik_poveznica" href="kategorije_elemenata.php">Kategorije</a>';
                echo '<a class="izbornik_poveznica" href="zahtjevi_po_moderatoru.php">Zahtjevi po moderatoru</a>';
            break;
        }

    }

    ?>
    <br><br>
    </div>

<div class="aplikacija">



