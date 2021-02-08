<?php 

    include('baza_podataka.php'); 
    spajanje_na_bazu();
    
?>

<?php 

    include('header.php');
    
?>

<h3>Slanje zahtjeva za novim projektnim planom</h3>

<?php 

if(isset($_POST['moderator']) && !empty($_POST['moderator']))
{
    
    $pohrana = "INSERT INTO projekt (korisnik_id, moderator_id, datum_vrijeme_kreiranja, zakljucan)
                VALUES (".$_SESSION['korisnik_id'].", ".$_POST['moderator'].", NOW(), 0)";
        
    upit($pohrana);
}

$moderatori_option = '';

$moderatori = "SELECT korisnik_id, ime, prezime FROM korisnik WHERE tip_id = 1";
$upit_baza = upit($moderatori);

if(mysqli_num_rows($upit_baza) > 0)
{
    while($podaci=mysqli_fetch_assoc($upit_baza))
    {
        $moderatori_option .= '<option value="'.$podaci['korisnik_id'].'">'.$podaci['ime'].' '.$podaci['prezime'].'</option>';
    }   
}

?>

<form action="zahtjev_novi_projekt.php" name="zahtjev_novi_projekt" method="POST">
  <label for="moderator">Moderator:</label> 
  <select name="moderator">
    <?php echo $moderatori_option; ?>
  </select><br><br>
  <input type="submit" value="Pošalji zahtjev">
</form>
