<?php 

    include('baza_podataka.php'); 
    spajanje_na_bazu();
    
?>

<?php 

    include('header.php');
    
?>

<h3>Zahtjevi po moderatoru</h3>

<?php 
$korisnici_option = '';

$korisnici = "SELECT korisnik_id, ime, prezime FROM korisnik WHERE tip_id = 2 OR tip_id = 1";
$upit_baza = upit($korisnici);

if(mysqli_num_rows($upit_baza) > 0)
{
    while($podaci=mysqli_fetch_assoc($upit_baza))
    {
        $korisnici_option .= '<option value="'.$podaci['korisnik_id'].'">'.$podaci['ime'].' '.$podaci['prezime'].'</option>';
    }   
}

?>

<form action="zahtjevi_po_moderatoru.php" name="zahtjevi_po_moderatoru" method="POST">
  <label for="korisnik">Korisnik:</label> 
  <select name="korisnik">
    <?php echo $korisnici_option; ?>
  </select><br><br>
  <label for="datum_od">Datum i vrijeme od:</label> 
  <input type="text" id="datum_od" name="datum_od" value=""><br><br>
  <label for="opis">Datum i vrijeme do:</label> 
  <input type="text" id="datum_do" name="datum_do" value=""><br><br>
  
  <input type="submit" value="Filtriraj">
</form>

<br><br>

<table>
    <tr>
        <th>Moderator</th>
        <th>Ukupno</th>
    </tr>

<?php 

$korisnik = "";

if(isset($_POST['korisnik']) && !empty($_POST['korisnik']))
{
    $korisnik = " AND p.korisnik_id= " . $_POST['korisnik'];
}

$datum_od = "";

if(isset($_POST['datum_od']) && !empty($_POST['datum_od']))
{
    $formatirani_datum_od = date('Y-m-d', strtotime($_POST['datum_od']));

    $datum_od = " AND p.datum_vrijeme_kreiranja >= " . $formatirani_datum_od;
}

$datum_do = "";

if(isset($_POST['datum_do']) && !empty($_POST['datum_do']))
{
    $formatirani_datum_do = date('Y-m-d', strtotime($_POST['datum_od']));

    $datum_do = " AND p.datum_vrijeme_kreiranja <= " . $formatirani_datum_do;
}

$upit = "SELECT k.ime, k.prezime, COUNT(p.moderator_id) AS ukupno FROM projekt p, korisnik k 
        WHERE p.moderator_id=k.korisnik_id $korisnik $datum_od $datum_do
        GROUP BY p.moderator_id";

$upit_baza = upit($upit);

if(mysqli_num_rows($upit_baza) > 0)
{
    while($podaci=mysqli_fetch_assoc($upit_baza))
    {
        echo '<tr>';
        echo '<td>'.$podaci['ime'].' '.$podaci['prezime'].'</td>';
        echo '<td>'.$podaci['ukupno'].'</td>';
        echo '</tr>';
    }   
}



?>

</table>