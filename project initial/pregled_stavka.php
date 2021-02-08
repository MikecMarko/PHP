<?php 

    include('baza_podataka.php'); 
    spajanje_na_bazu();
    
?>

<?php 

    include('header.php');
    
?>

<h3>Pregled stavaka projekta</h3>

<table>
    <tr>
        <th>Opis stavke</th>
        <th>Slike stavke</th>
        <th>Video stavke</th>
    </tr>

<?php 

$upit = "SELECT * FROM stavke_projekta WHERE projekt_id = " . $_GET['projekt_id'];
$upit_baza = upit($upit);

if(mysqli_num_rows($upit_baza) > 0)
{
    

    while($podaci=mysqli_fetch_assoc($upit_baza))
    {
        
        $video = '-';

        if($podaci['video'] != '')
        {
            $video = '<iframe width="200" height="100" src="'.$podaci['video'].'?autoplay=0"> </iframe>';
        }

        echo '<tr>';
        echo '<td>'.$podaci['opis'].'</td>';
        echo '<td><img src="'.$podaci['slika'].'" width="100" height="100"></td>';
        echo '<td>'.$video.'</td>';
        echo '</tr>';
    }

    
}


?>

</table>