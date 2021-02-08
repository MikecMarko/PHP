<?php 

    include('baza_podataka.php'); 
    spajanje_na_bazu();
    
?>

<?php 

    include('header.php');
    
?>


<h3>Stavke projekta</h3>

<?php 

if(
    isset($_POST['kategorija_id']) && !empty($_POST['kategorija_id']) &&
    isset($_POST['projekt_id']) && !empty($_POST['projekt_id'])
    )
{
    $azuriraj_stavku = "UPDATE stavke_projekta SET opis = '".$_POST['opis']."', slika = '".$_POST['slika']."', video = '".$_POST['video']."'
                        WHERE projekt_id = '".$_POST['projekt_id']."' AND kategorija_id = '".$_POST['kategorija_id']."'";
    upit($azuriraj_stavku);

    header("Location:stavke_projekta.php?projekt_id=".$_POST['projekt_id']);
}

$kategorije_option = '';
$opis = '';
$slika = '';
$video = '';
$kategorija_id = '';

$nepopunjene_kategorije_dohvat = "SELECT * FROM kategorija 
                                  WHERE kategorija_id NOT IN (SELECT kategorija_id FROM stavke_projekta WHERE projekt_id = '".$_GET['projekt_id']."')";
                                  
$upit_baza_kategorije = upit($nepopunjene_kategorije_dohvat);

if(mysqli_num_rows($upit_baza_kategorije) > 0)
{
    while($podaci_kategorije=mysqli_fetch_assoc($upit_baza_kategorije))
    {
        $kategorije_option .= '<option value="'.$podaci_kategorije['kategorija_id'].'">'.$podaci_kategorije['naziv'].' ('.$podaci_kategorije['opis'].')</option>';
    }
}


if(isset($_GET['kategorija_id']) && !empty($_GET['kategorija_id']))
{
    $kategorija_id = $_GET['kategorija_id'];

    $kategorije_option = '';

    $dohvat_azuriranje = "SELECT *, stavke_projekta.opis AS stavke_projekta_opis, kategorija.opis AS kategorija_opis 
                          FROM stavke_projekta, kategorija 
                          WHERE stavke_projekta.kategorija_id = kategorija.kategorija_id AND  
                          stavke_projekta.kategorija_id = ".$_GET['kategorija_id']." AND projekt_id = '".$_GET['projekt_id']."'";
    $upit_dohvat_azuriranje = upit($dohvat_azuriranje);

    if(mysqli_num_rows($upit_dohvat_azuriranje) > 0)
    {
        while($podaci_dohvat_azuriranje=mysqli_fetch_assoc($upit_dohvat_azuriranje))
        {
            
            $kategorije_option .= 
               '<option value="'.$podaci_dohvat_azuriranje['kategorija_id'].'">
                '.$podaci_dohvat_azuriranje['naziv'].' ('.$podaci_dohvat_azuriranje['kategorija_opis'].')
                </option>';

            $opis = $podaci_dohvat_azuriranje['stavke_projekta_opis'];
            $slika = $podaci_dohvat_azuriranje['slika'];
            $video = $podaci_dohvat_azuriranje['video'];
        }
    }
}

if(
isset($_POST['kategorija']) && !empty($_POST['kategorija']) &&
isset($_POST['opis']) && !empty($_POST['opis']) &&
isset($_POST['slika']) && !empty($_POST['slika']) &&
empty($_POST['stavka_id'])
)
{
     $insert_stavka = "INSERT INTO stavke_projekta (projekt_id, kategorija_id, opis, slika, video) 
                       VALUES ('".$_POST['projekt_id']."', '".$_POST['kategorija']."', '".$_POST['opis']."', '".$_POST['slika']."', 
                       '".$_POST['video']."')";
     upit($insert_stavka);

     header("Location:stavke_projekta.php?projekt_id=".$_POST['projekt_id']);
}

?>

<form action="stavke_projekta.php" name="stavke_projekta" method="POST">
  <input type="hidden" name="kategorija_id" value="<?php echo $kategorija_id?>">
  <input type="hidden" name="projekt_id" value="<?php echo $_GET['projekt_id'] ?>">
  <label for="kategorija">Kategorija:</label> 
  <select required name="kategorija">
    <?php echo $kategorije_option; ?>
  </select><br><br>
  <label for="opis">Opis:</label> 
  <input required type="text" id="opis" name="opis" value="<?php echo $opis ?>"><br><br>
  <label for="slika">Slika:</label> 
  <input required type="text" id="slika" name="slika" value="<?php echo $slika ?>"><br><br>
  <label for="video">Video:</label> 
  <input type="text" id="video" name="video" value="<?php echo $video ?>"><br><br>
  <input type="submit" value="Pohrani stavku">
</form>

<br>
<hr>
<br>

<?php 

$link_zakljucavanje = '';

$provjera_moze_li_se_zakljucati = "SELECT * FROM stavke_projekta, kategorija
                                   WHERE stavke_projekta.kategorija_id = kategorija.kategorija_id AND 
                                   kategorija.obavezna = 1 AND 
                                   projekt_id = " . $_GET['projekt_id'];
$upit_zakljucati = upit($provjera_moze_li_se_zakljucati);

if(mysqli_num_rows($upit_zakljucati) > 1)
{
    $link_zakljucavanje = '<a href="zakljucaj_projekt.php?projekt_id='.$_GET['projekt_id'].'"><button>Zaključaj projekt</button></a>';
}

echo $link_zakljucavanje .'<br><br>';

?>

<table>
    <tr>
        <th>Akcija</th>
        <th>Naziv kategorije</th>
        <th>Opis kategorije</th>
        <th>Opis stavke</th>
        <th>Slika</th>
        <th>Video</th>
    </tr>


<?php



$stavke_prikaz = "SELECT *, kategorija.opis AS kategorija_opis, stavke_projekta.opis AS stavke_projekta_opis
                  FROM stavke_projekta, kategorija WHERE stavke_projekta.kategorija_id = kategorija.kategorija_id AND projekt_id = " . $_GET['projekt_id'];

$upit_baza = upit($stavke_prikaz);

if(mysqli_num_rows($upit_baza) > 0)
{
    while($podaci=mysqli_fetch_assoc($upit_baza))
    {
        $slika = '-';
        $video = '-';

        if($podaci['slika'] != '')
        {
            $slika = '<img src="'.$podaci['slika'].'" width = "100" height = "100"';
        }

        if($podaci['video'] != '')
        {
            $video = '<iframe width="260" height="115" src="'.$podaci['video'].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }

        echo '<tr>';
        echo '<td><a href="stavke_projekta.php?projekt_id='.$podaci['projekt_id'].'&kategorija_id='.$podaci['kategorija_id'].'">Ažuriraj</a></td>';
        echo '<td>'.$podaci['naziv'].'</td>';
        echo '<td>'.$podaci['kategorija_opis'].'</td>';
        echo '<td>'.$podaci['stavke_projekta_opis'].'</td>';
        echo '<td>'.$slika.'</td>';
        echo '<td>'.$video.'</td>';
        echo '</tr>';
    }
}

?>

</table>