<?php 

    include('baza_podataka.php'); 
    spajanje_na_bazu();
    
?>

<?php 

    include('header.php');
    
?>

<h3>Kategorije elemenata</h3>

<a href="dodaj_kategoriju.php"><button>Dodaj kategoriju</button></a>

<br><br>

<table>
    <tr>
        <th></th>
        <th>Naziv</th>
        <th>Opis</th>
        <th>Obavezna</th>
    </tr>

<?php 

$upit = "SELECT * FROM kategorija";

$upit_baza = upit($upit);

if(mysqli_num_rows($upit_baza) > 0)
{
    while($podaci=mysqli_fetch_assoc($upit_baza))
    {
        $obavezno = 'NE';

        if($podaci['obavezna'] == 1)
        {
            $obavezno = 'DA';
        }
       
        echo '<tr>';
        echo '<td><a href="azuriraj_kategoriju.php?kategorija_id='.$podaci['kategorija_id'].'">Ažuriraj</a></td>';
        echo '<td>'.$podaci['naziv'].'</td>';
        echo '<td>'.$podaci['opis'].'</td>';
        echo '<td>'.$obavezno.'</td>';
        echo '</tr>';
    }   
}

?>

</table>