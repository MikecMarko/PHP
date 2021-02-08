<?php 

    include('baza_podataka.php'); 
    spajanje_na_bazu();
    
?>

<?php 

    include('header.php');
    
?>


<h3>Prijava u sustav</h3>

<?php 

if( isset($_POST['username']) && 
    !empty($_POST['username']) && 
    isset($_POST['sifra']) && 
    !empty($_POST['sifra'])){
  
    $prijava_upit = "SELECT * FROM korisnik WHERE lozinka = '".$_POST['sifra']."' AND korisnicko_ime = '".$_POST['username']."'";

    $provjera_prijava_baza = upit($prijava_upit);

    if(mysqli_num_rows($provjera_prijava_baza) > 0)
    {
        while($podaci_korisnik=mysqli_fetch_assoc($provjera_prijava_baza))
        {
            $_SESSION = $podaci_korisnik;
        }

        if($_SESSION['tip_id'] == 1)
        {
            header("Location:zahtjevi_korisnika_za_projektnim_planom.php");
        }
        else
        {
            header("Location:index.php");
        }

        
    }
    else
    {
        echo "<br><h4 style='color: red'>Pogrešno korisničko ime ili lozinka, pokušajte ponovno!</h4>";
    }
}




?>

<form action="prijava.php" name="prijava" method="POST">
  <label for="username">Korisničko ime:</label> 
  <input type="text" id="username" name="username" value=""><br><br>
  <label for="sifra">Lozinka:</label> 
  <input type="password" id="sifra" name="sifra" value=""><br><br>
  <input type="submit" value="Pošalji">
</form>
