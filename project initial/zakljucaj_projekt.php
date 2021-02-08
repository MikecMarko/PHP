<?php 

include('baza_podataka.php'); 
spajanje_na_bazu();

?>

<?php 

    $zakljucaj = "UPDATE projekt SET zakljucan = 1 WHERE projekt_id = " . $_GET['projekt_id'];
    upit($zakljucaj);

    header("Location:zahtjevi_korisnika_za_projektnim_planom.php");


?>