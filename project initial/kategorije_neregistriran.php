<?php 

    include('baza_podataka.php'); 
    spajanje_na_bazu();
    
?>

<?php 

    include('header.php');
    
?>

<h3>Kategorije s brojem projekata koji imaju tu kategoriju kao stavku</h3>

<table>
    <tr>
        <th>Naziv</th>
        <th>Zbroj ukupno</th>
    </tr>

<?php 

$upit = "SELECT k.naziv, COUNT(k.kategorija_id) AS zbroj  FROM kategorija k, stavke_projekta s 
         WHERE s.kategorija_id = k.kategorija_id GROUP BY k.kategorija_id";

$upit_baza = upit($upit);

if(mysqli_num_rows($upit_baza) > 0)
{
    

    while($podaci=mysqli_fetch_assoc($upit_baza))
    {
        echo '<tr>';
        echo '<td>'.$podaci['naziv'].'</td>';
        echo '<td>'.$podaci['zbroj'].'</td>';
        echo '</tr>';
    }

    
}

?>

</table>