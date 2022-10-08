<?php
include('../func/functions.php');
#$conn = mysqli_connect('localhost', 'root', '', 'slatkakuca2021') or die('Greska!'.mysqli_error($conn));

$zahtev = $_GET['zahtev'];

if($zahtev == "prihvati")
{
    $idN = $_POST['idN'];
    $sql = "UPDATE narudzbine set status='Prihvaceno' where idN=$idN";
    $res = mysqli_query($conn, $sql);

    if($res)
    {
        echo "Narudzbina prihvacena. Poslato na spremanje!";
        return true;
    }
    else{
        echo "Greska prilikom prihvatanja narudzbine!";
        return false;
    }
}

if($zahtev == "odbij")
{
    $idN = $_POST['idN'];
    $sql = "UPDATE narudzbine set status='Odbijeno' where idN=$idN";
    $res = mysqli_query($conn, $sql);

    if($res)
    {
        echo "Narudzbina odbijena!";
        return true;
    }
    else{
        echo "Greska prilikom odbijanja narudzbine!";
        return false;
    }
}

if($zahtev == 'narudzbina')
{
    if(isset($_POST['velicina']))
    {
        $krofna = $_POST['velicina'];
        $kupac = $_SESSION['ime'];
        $datum = date("Y-m-d H:i:m", time());
        $sql = "INSERT INTO narudzbine (kupac, ponuda, datum, status) VALUES('$kupac', '$krofna', '$datum', 'Neobradjeno')";
        $res = mysqli_query($conn, $sql);
        if(mysqli_affected_rows($conn) != 0)
        {
            echo "Uspesno ste porucili!";
            return false;
        }else
        {
            echo "Greska prilikom porucivanja";
            exit();
        }
    }
}


?>