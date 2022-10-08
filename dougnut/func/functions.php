<?php

session_start();


$conn = @mysqli_connect('localhost', 'root', '', 'slatkakuca2021')
    or die("Greska prilikom konekcije na bazu!". mysqli_error($conn));

function login()
{
    if(isset($_SESSION['korisnik']) and isset($_SESSION['status']))
        return true;
    else
        return false;
}


function tableOrders()
{
    global $conn;

    $sql = "SELECT * from ponude inner join narudzbine on ponude.idP = narudzbine.ponuda where status = 'Neobradjeno'";
    $res = mysqli_query($conn, $sql);

    echo "<div class='info'></div>";

    echo "<table id='customers'>
            <tr>
                <th>Ime kupca</th>
                <th>Naziv ponude</th>
                <th>Datum narudzbine</th>
                <th>Opcija</th>
            <tr>";

    while($row = mysqli_fetch_assoc($res))
    {
        echo    "<tr>
                    <td>".$row['kupac']."</td>
                    <td>".$row['naziv']."</td>
                    <td>".$row['datum']."</td>
                        <td align='center'>                            
                            <input type='submit' value='Prihvati' name='btnPrihvati'  onclick='prihvati(".$row['idN'].")'>
                            <input type='submit' value='Odbij' name='btnOdbij' data-id='{$row['idN']}' onclick='odbij(".$row['idN'].")'>
                        </td>
                </tr>";
    }

    echo "</table>";
}


function loginUser()
{
    global $conn;

    if(isset($_POST['btnLogin']))
    {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "SELECT * FROM korisnici where kor_ime='$username' and lozinka='$password'";
        $res = mysqli_query($conn, $sql);
        
        if($username == "" or $password == "")
        {
            echo "Svi podaci su obavezni";
            return false;
        }
        if (mysqli_num_rows($res) == 0)
        {
            echo "Ne postoji korisnik u bazi!";
            return false;
        }

        $row = mysqli_fetch_assoc($res);
        
        if($username == $row['kor_ime'] and $password != $row['lozinka'])
        {
            echo "Nispravna lozinka! Pokusajte opet.";
            return false;
        }

        // ako je sve u redu kreiramo sesije
        $_SESSION['ime'] = $row['kor_ime'];
        $_SESSION['korisnik'] = $row['ime'] . " " . $row['prezime'];
        $_SESSION['status'] = $row['tip'];
        redirect('index.php');
    }
}


function ponude()
{
    global $conn;
    $sql = "SELECT * FROM ponude";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res))
    {
        echo "<input type='radio' name='ponuda' value='".$row['idP']."' id='".$row['idP']."'><label for='".$row['idP']."'>".$row['naziv']."</label><br>";
    }
}

function createAnOrder()
{
    global $conn;
    
    if (isset($_POST['btnPoruci']))
    {

        $kupac = $_SESSION['ime'];
        #$ime = $_POST['ime'];
        #$prezime = $_POST['prezime'];
        #$adresa = $_POST['adresa'];
        #$pbroj = $_POST['pbroj'];
        #$nacin = $_POST['nacin'];
        $ponuda = $_POST['ponuda'];

        $datum = date("Y-m-d");

        $sql = "INSERT INTO narudzbine(kupac, ponuda, datum, status) 
            VALUE('$kupac', '$ponuda', '$datum', 'Neobradjeno')";
        $res = mysqli_query($conn, $sql);
        if(mysqli_affected_rows($conn) != 0)
        {
            echo "<div class='zelen'>Uspesno ste porucili krofnu! <br>Ceka se odobrenje operatera!</div>";
            return true;
        }else
        {
            echo "<div class='crven'>Greska prilikom porucivanja!</div>";
            return false;
        }

    }
}

function logout()
{
    if(isset($_GET['odjava']))
    {
        session_unset();
        session_destroy();
        redirect('index.php');
        exit();
    }
}

function redirect(string $adress)
{
    header("Location: $adress");
    exit();
}



?>