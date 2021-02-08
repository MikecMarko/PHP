<?php 

    include('baza_podataka.php'); 
    spajanje_na_bazu();
    
?>

<?php 

    include('header.php');
    
?>

<h3>Zahtjevi korisnika za projektnim planom</h3>

<table>
    <tr>
        <th>Akcija</th>
        <th>Korisnik</th>
        <th>Naziv</th>
        <th>Opis</th>
        <th>Vrijeme zahtjeva</th>
        <th>Status</th>
    </tr>

<?php 

$upit = "SELECT * FROM projekt, korisnik
         WHERE projekt.korisnik_id = korisnik.korisnik_id AND moderator_id = " . $_SESSION['korisnik_id'] ." ORDER BY zakljucan";

$upit_baza = upit($upit);

if(mysqli_num_rows($upit_baza) > 0)
{
    

    while($podaci=mysqli_fetch_assoc($upit_baza))
    {

        $link_zakljucavanje = '';

        $provjera_moze_li_se_zakljucati = "SELECT * FROM stavke_projekta, kategorija
                                        WHERE stavke_projekta.kategorija_id = kategorija.kategorija_id AND 
                                        kategorija.obavezna = 1 AND 
                                        projekt_id = " . $podaci['projekt_id'];

        $upit_zakljucati = upit($provjera_moze_li_se_zakljucati);

        if(mysqli_num_rows($upit_zakljucati) > 1)
        {
            if($podaci['zakljucan'] == 0)
            {
                $link_zakljucavanje = '<a href="zakljucaj_projekt.php?projekt_id='.$podaci['projekt_id'].'">Zaključaj projekt</a>';
            }
            
        }

        $datum_vrijeme_kreiranja = strtotime($podaci['datum_vrijeme_kreiranja']);
        $datum_vrijeme_kreiranja_formatiraj = date("d.m.Y. H:i:s", $datum_vrijeme_kreiranja);

        if($podaci['zakljucan'] == 0)
        {
            if($podaci['naziv'] == '')
            {
                $link = '<a href="prihvati_zahtjev.php?projekt_id='.$podaci['projekt_id'].'">Prihvati zahtjev</a>';
            }
            else
            {
                $link = '<a href="stavke_projekta.php?projekt_id='.$podaci['projekt_id'].'">Stavke projekta</a>';
            }

            $status = 'Otključano';
        }
        else
        {
            $link = '-';
            $status = 'Zaključano';
        }

        echo '<tr>';
        echo '<td>'.$link.' '. $link_zakljucavanje .'</td>';
        echo '<td>'.$podaci['ime'].' ' .$podaci['prezime']. '</td>';
        echo '<td>'.$podaci['naziv'].'</td>';
        echo '<td>'.$podaci['opis'].'</td>';
        echo '<td>'.$datum_vrijeme_kreiranja_formatiraj.'</td>';
        echo '<td>'.$status.'</td>';
        echo '</tr>';
    }

    
}

?>

</table>