<?php

global $mysqli;

function spajanje_na_bazu()
{

    global $mysqli;

    $mysqli = mysqli_connect(
        "localhost", 
        "iwa_2019", 
        "foi2019", 
        "iwa_2019_zb_projekt"
    );    

    if (mysqli_connect_errno()) 
    {
        echo "Došlo je do greške sa radom na bazi podataka: ". $mysqli->connect_error;
    }

    mysqli_query($mysqli, "SET names 'UTF8'");
}

function upit($upit_baza)
{
    global $mysqli;

    $result_return = mysqli_query($mysqli, $upit_baza);
    
    if(!$result_return)
    {
        echo "Došlo je do greške sa radom na bazi podataka: " . mysqli_error($mysqli);

        exit();
    }
    
	return $result_return;
}

function zatvori_spajanje()
{
	global $mysqli;
	mysqli_close($mysqli);
}
