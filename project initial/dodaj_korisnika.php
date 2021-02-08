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
    
    $azuriranje_korisnika = "INSERT INTO korisnik (tip_id, korisnicko_ime, lozinka, ime, prezime, email, slika)
                             VALUES ('".$_POST['tip']."', '".$_POST['korisnicko_ime']."', '".$_POST['lozinka']."', '".$_POST['ime']."', 
                             '".$_POST['prezime']."', '".$_POST['email']."', '".$_POST['slika']."')";
    upit($azuriranje_korisnika);

    header("Location:korisnici.php");
}

?>


<form action="dodaj_korisnika.php" name="dodaj_korisnika" method="POST">
  <label for="tip">Tip:</label> 
  <select name="tip">
        <option value="0">Admin</option>
        <option value="1">Moderator</option>
        <option value="2">Registrirani korisnik</option>
  </select><br><br>
  <label for="korisnicko_ime">Korisničko ime:</label> 
  <input required type="text" id="korisnicko_ime" name="korisnicko_ime" value=""><br><br>
  <label for="lozinka">Lozinka:</label> 
  <input required type="text" id="lozinka" name="lozinka" value=""><br><br>
  <label for="ime">Ime:</label> 
  <input required type="text" id="ime" name="ime" value=""><br><br>
  <label for="prezime">Prezime:</label> 
  <input required type="text" id="prezime" name="prezime" value=""><br><br>
  <label for="email">E-mail:</label> 
  <input requiredtype="text" id="email" name="email" value=""><br><br>
  <label for="slika">Slika:</label> 
  <input type="text" id="slika" name="slika" value=""><br><br>
  <input type="submit" value="Pohrani">
</form>