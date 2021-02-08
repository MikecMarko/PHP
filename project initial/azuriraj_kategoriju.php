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
    $upit = "UPDATE kategorija SET naziv = '".$_POST['naziv']."', opis = '".$_POST['opis']."', obavezna = '".$_POST['obavezna']."' WHERE kategorija_id = " . $_POST['kategorija_id'];
    upit($upit);

    header("Location:kategorije_elemenata.php");
}

$naziv = '';
$opis = '';


$podaci_azuriranje = "SELECT * FROM kategorija WHERE kategorija_id = " . $_GET['kategorija_id'];

$podaci_upita = upit($podaci_azuriranje);

if(mysqli_num_rows($podaci_upita) > 0)
{
    while($podaci=mysqli_fetch_assoc($podaci_upita))
    {
        $naziv = $podaci['naziv'];
        $opis = $podaci['opis'];

        if($podaci['obavezna'] == 1)
        {
            $select_da = 'selected';
            $select_ne = '';
        }
        else
        {
            $select_ne = 'selected';
            $select_da = '';
        }
        
    }
}

?>

<form action="azuriraj_kategoriju.php" name="azuriraj_kategoriju" method="POST">
  <input type="hidden" name="kategorija_id" value="<?php echo $_GET['kategorija_id'] ?>">
  <label for="naziv">Naziv:</label> 
  <input required type="text" id="naziv" name="naziv" value="<?php echo $naziv ?>"><br><br>
  <label for="opis">Opis:</label> 
  <input required type="text" id="opis" name="opis" value="<?php echo $opis ?>"><br><br>
  <label for="obavezna">Obavezna:</label> 
  <select name="obavezna">
    <option value="0" <?php echo $select_ne ?>>NE</option>
    <option value="1" <?php echo $select_da ?>>DA</option>
  </select><br><br>
  <input type="submit" value="Pošalji">
</form>

