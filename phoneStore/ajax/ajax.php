<?php 

include("../func/functions.php");


$zahtev = $_GET['request'];

if($zahtev == 'login')
{

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "SELECT * from korisnici where email='$user' and lozinka='$pass'";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) == 0)
    {
        echo "Korisnik ne postoji u bazi!";
        return false;
    }
    $row = mysqli_fetch_object($res);

    if($user == $row->email and $pass != $row->lozinka)
    {
        echo "Pogresna lozinka!";
        return false;
    }

    $_SESSION['korisnik'] = $row->ime . " " . $row->prezime;
    $_SESSION['id'] = $row->id;   
    echo "1";
    
}

if($zahtev == "buy")
{
    $idModela = $_POST['id'];
    $sql = "SELECT * from korpa where idModela=$idModela and idKorisnika =".$_SESSION['id'];
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) != 0)
    {
        echo "Ovaj telefon je vec dodat!";
        return false;
    }
    else
        {
            $sql = "INSERT INTO korpa(idModela, idKorisnika) VALUES($idModela, '".$_SESSION['id']."')";
            mysqli_query($conn, $sql);
            if(mysqli_affected_rows($conn))
            {
                echo "Uspesno ste dodali telefon!"; 
                upis('../txt/kupovina.txt', "Korisnik: '".$_SESSION['korisnik']."' je dodao telefon.");
                return false;        
            }else
            {
                echo "Greska prilikom dodavanja!";
            }
        }
}

if($zahtev = "refund")
{
    if(isset($_GET['idModela']))
    {
        $idModela = $_GET['idModela'];
        #$sql = "SELECT * from vwkorpa where idModela=$idModela and idKorisnika=". $_SESSION['id'];
        $sql = @"DELETE from korpa where idModela=$idModela and idKorisnika=".$_SESSION['id'];
        @mysqli_query($conn, $sql);

        if(mysqli_affected_rows($conn) == 0)
        {
            echo "Greska!";
            return false;
        }else
            {
                echo "Uspesno obrisan telefon!";  
                upis('../txt/kupovina.txt', "Korisnik: '".$_SESSION['korisnik']."' je uklonio telefon.");          
            }
    }
    
}


?>