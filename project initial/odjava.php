<?php 

    include('baza_podataka.php'); 
    spajanje_na_bazu();
    
?>

<?php 

    include('header.php');

    session_destroy();

    header("Location:index.php");
    
?>
