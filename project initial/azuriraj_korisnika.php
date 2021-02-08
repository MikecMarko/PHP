<?php 

    include('baza_podataka.php'); 
    spajanje_na_bazu();
    
?>

<?php 

    include('header.php');
    
?>

<h3>Ažuriranje korisnika</h3>

<?php 

if(
    isset($_POST['tip']) &&
    isset($_POST['korisnicko_ime']) && !empty($_POST['korisnicko_ime']) &&
    isset($_POST['lozinka']) && !empty($_POST['lozinka']) &&
    isset($_POST['ime']) && !empty($_POST['ime']) &&
    isset($_POST['prezime']) && !empty($_POST['prezime']) &&
    isset($_POST['email']) && !empty($_POST['email']) 
)
{
    
    $azuriranje_korisnika = "UPDATE korisnik SET tip_id = '".$_POST['tip']."', korisnicko_ime = '".$_POST['korisnicko_ime']."' ,
                             lozinka = '".$_POST['lozinka']."', ime = '".$_POST['ime']."', prezime = '".$_POST['prezime']."', 
                             email = '".$_POST['email']."', slika = '".$_POST['slika']."'
                             WHERE korisnik_id = " . $_POST['korisnik_id'];
    upit($azuriranje_korisnika);

    header("Location:korisnici.php");
}


$podaci_korisnika = "SELECT * FROM korisnik WHERE korisnik_id = " . $_GET['korisnik_id'];
$upit_baza = upit($podaci_korisnika);

if(mysqli_num_rows($upit_baza) > 0)
{
    while($podaci=mysqli_fetch_assoc($upit_baza))
    {
        $korisnicko_ime = $podaci['korisnicko_ime'];
        $lozinka = $podaci['lozinka'];
        $ime = $podaci['ime'];
        $prezime = $podaci['prezime'];
        $email = $podaci['email'];
        $slika = $podaci['slika'];

        if($podaci['tip_id'] == 0)
        {
            $admin = 'selected';
        }
        else
        {
            $admin = '';
        }

        if($podaci['tip_id'] == 1)
        {
            $moderator = 'selected';
        }
        else
        {
            $moderator = '';
        }

        if($podaci['tip_id'] == 2)
        {
            $korisnik = 'selected';
        }
        else
        {
            $korisnik = '';
        }

    }
}

?>


<form action="azuriraj_korisnika.php" name="azuriraj_korisnika" method="POST">
  <input type="hidden" name="korisnik_id" value="<?php echo $_GET['korisnik_id'] ?>">
  <label for="tip">Tip:</label> 
  <select name="tip">
        <option value="0" <?php echo $admin ?>>Admin</option>
        <option value="1" <?php echo $moderator ?>>Moderator</option>
        <option value="2" <?php echo $korisnik ?>>Registrirani korisnik</option>
  </select><br><br>
  <label for="korisnicko_ime">Korisničko ime:</label> 
  <input required type="text" id="korisnicko_ime" name="korisnicko_ime" value="<?php echo $korisnicko_ime ?>"><br><br>
  <label for="lozinka">Lozinka:</label> 
  <input required type="text" id="lozinka" name="lozinka" value="<?php echo $lozinka ?>"><br><br>
  <label for="ime">Ime:</label> 
  <input required type="text" id="ime" name="ime" value="<?php echo $ime ?>"><br><br>
  <label for="prezime">Prezime:</label> 
  <input required type="text" id="prezime" name="prezime" value="<?php echo $prezime ?>"><br><br>
  <label for="email">E-mail:</label> 
  <input requiredtype="text" id="email" name="email" value="<?php echo $email ?>"><br><br>
  <label for="slika">Slika:</label> 
  <input type="text" id="slika" name="slika" value="<?php echo $slika ?>"><br><br>
  <input type="submit" value="Pohrani">
</form>