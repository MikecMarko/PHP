<?php 

    include('baza_podataka.php'); 
    spajanje_na_bazu();
    
?>

<?php 

    include('header.php');
    
?>

<h3>Dodaj kategoriju</h3>

<?php

if(
    isset($_POST['naziv']) && !empty($_POST['naziv']) &&
    isset($_POST['opis']) && !empty($_POST['opis']) &&
    isset($_POST['obavezna'])
)
{
    $upit = "INSERT INTO kategorija (naziv, opis, obavezna) VALUES ('".$_POST['naziv']."', '".$_POST['opis']."', '".$_POST['obavezna']."')";
    upit($upit);

    header("Location:kategorije_elemenata.php");
}

?>

<form action="dodaj_kategoriju.php" name="dodaj_kategoriju" method="POST">
  <label for="naziv">Naziv:</label> 
  <input required type="text" id="naziv" name="naziv" value=""><br><br>
  <label for="opis">Opis:</label> 
  <input required type="text" id="opis" name="opis" value=""><br><br>
  <label for="obavezna">Obavezna:</label> 
  <select name="obavezna">
    <option value="0">NE</option>
    <option value="1">DA</option>
  </select><br><br>
  <input type="submit" value="Pošalji">
</form>

