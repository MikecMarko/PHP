<?php 

    include('baza_podataka.php'); 
    spajanje_na_bazu();
    
?>

<?php 

    include('header.php');
    
?>

<h3>Prihvati zahtjev</h3>

<?php 

if(isset($_POST['projekt_id']) && !empty($_POST['projekt_id']) &&
    isset($_POST['naziv']) && !empty($_POST['naziv']) &&
    isset($_POST['opis']) && !empty($_POST['opis']))
{
    
    $upit = "UPDATE projekt SET naziv = '".$_POST['naziv']."', opis = '".$_POST['opis']."' WHERE projekt_id = " . $_POST['projekt_id'];
    upit($upit);

    header("Location:zahtjevi_korisnika_za_projektnim_planom.php");

}
?>




<form action="prihvati_zahtjev.php" name="prihvati_zahtjev" method="POST">
  <input type="hidden" name="projekt_id" value="<?php echo $_GET['projekt_id'] ?>">
  <label for="naziv">Naziv:</label> 
  <input type="text" id="naziv" name="naziv" value=""><br><br>
  <label for="opis">Opis:</label> 
  <input type="text" id="opis" name="opis" value=""><br><br>
  <input type="submit" value="Prihvati">
</form>