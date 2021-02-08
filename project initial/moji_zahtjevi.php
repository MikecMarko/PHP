<?php 

    include('baza_podataka.php'); 
    spajanje_na_bazu();
    
?>

<?php 

    include('header.php');
    
?>

<h3>Moji zahtjevi</h3>

<table>
    <tr>
        <th>Akcija</th>
        <th>Naziv</th>
        <th>Datum i vrijeme kreiranja</th>
        <th>Ime</th>
        <th>Prezime</th>
        <th>Status</th>
    </tr>

<?php 

$upit = "SELECT p.naziv, p.datum_vrijeme_kreiranja,p.zakljucan,p.projekt_id,
(SELECT ime FROM korisnik WHERE p.moderator_id=korisnik_id) as ime, 
(SELECT prezime FROM korisnik WHERE p.moderator_id=korisnik_id) as prezime
FROM projekt p, korisnik k WHERE  k.korisnik_id = ".$_SESSION['korisnik_id']." AND k.korisnik_id=p.korisnik_id";

$upit_baza = upit($upit);

if(mysqli_num_rows($upit_baza) > 0)
{
    while($podaci=mysqli_fetch_assoc($upit_baza))
    {
        $datum_vrijeme_kreiranja = strtotime($podaci['datum_vrijeme_kreiranja']);
        $datum_vrijeme_kreiranja_formatiraj = date("d.m.Y. H:i:s", $datum_vrijeme_kreiranja);

        if($podaci['zakljucan'] == 0)
        {
            $link = '-';
            $status = 'Otključano';
        }
        else
        {
            $link = '<a href="pregled_stavka.php?projekt_id='.$podaci['projekt_id'].'">Stavke</a>';
            $status = 'Zaključano';
        }

        echo '<tr>';
        echo '<td>'.$link.'</td>';
        echo '<td>'.$podaci['naziv'].'</td>';
        echo '<td>'.$datum_vrijeme_kreiranja_formatiraj.'</td>';
        echo '<td>'.$podaci['ime'].'</td>';
        echo '<td>'.$podaci['prezime'].'</td>';
        echo '<td>'.$status.'</td>';
        echo '</tr>';
    }   
}

?>

</table>