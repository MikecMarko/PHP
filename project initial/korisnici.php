<?php 

    include('baza_podataka.php'); 
    spajanje_na_bazu();
    
?>

<?php 

    include('header.php');
    
?>

<h3>Korisnici</h3>

<a href="dodaj_korisnika.php"><button>Dodaj novog korisnika</button></a>

<br><br>

<table>
    <tr>
        <th></th>
        <th>Korisničko ime</th>
        <th>Lozinka</th>
        <th>Ime</th>
        <th>Prezime</th>
        <th>E-mail</th>
        <th>Slika</th>
    </tr>

<?php 

$upit = "SELECT korisnik_id, ime, korisnicko_ime, prezime, slika, lozinka, email 
        FROM korisnik";

$upit_baza = upit($upit);

if(mysqli_num_rows($upit_baza) > 0)
{
    while($podaci=mysqli_fetch_assoc($upit_baza))
    {
       
        echo '<tr>';
        echo '<td><a href="azuriraj_korisnika.php?korisnik_id='.$podaci['korisnik_id'].'">Ažuriraj</a></td>';
        echo '<td>'.$podaci['korisnicko_ime'].'</td>';
        echo '<td>'.$podaci['lozinka'].'</td>';
        echo '<td>'.$podaci['ime'].'</td>';
        echo '<td>'.$podaci['prezime'].'</td>';
        echo '<td>'.$podaci['email'].'</td>';
        echo '<td><img src="'.$podaci['slika'].'" width="100" height="100"></td>';
        echo '</tr>';
    }   
}

?>

</table>