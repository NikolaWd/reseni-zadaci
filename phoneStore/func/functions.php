<?php 

session_start();

$conn = @mysqli_connect('localhost', 'root', '', 'pva_septembar_2022')
    or die('Greska prilikom konekcije na bazu!'.mysqli_error($conn));


function login()
{
    if(isset($_SESSION['korisnik']))
        return true;
    else
        return false;
}


function logout()
{
    if(isset($_GET['odjava']))
    {
        session_unset();
        session_destroy();
        redirect('index.php');
    }
}

function redirect(string $adress)
{
    header("Location: $adress");
    exit();
}


function listing() 
{
    global $conn;
    
    $sql = "SELECT * from vwtelefoni";
    $res = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_object($res))
    {
        $dugme = "";
        $slika = "slike/";
        echo    "<div class='phone'>";
                    if(file_exists($slika.$row->slika))
                        $slika = "slike/".$row->slika;

        echo        "<img src='$slika' />
                     <h3>$row->naziv</h3>
                     <p>
                        <div>$row->model</div>
                        <div>$row->OS</div>
                        <div>Memorija: $row->memorija</div>
                        <div>Kamera: $row->kamera</div>";
                        if(login())
                            $dugme = "<input type='submit' value='Dodaj u korpu' onclick='dodaj($row->id)' />";                        
        echo        "
                    </p>
                    <p>$dugme</p>
                </div>";
    }
    
}


function listinShop()
{
    global $conn;
    
    $sql = "SELECT * from vwkorpa";
    $res = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_object($res))
    {
        $dugme = "";
        $slika = "slike/";
        echo    "<div class='phone'>";
                    if(file_exists($slika.$row->slika))
                        $slika = "slike/".$row->slika;

        echo        "<img src='$slika' />
                     <h3>$row->naziv</h3>
                     <p>
                        <div>$row->model</div>
                        <div>$row->OS</div>
                        <div>Memorija: $row->memorija</div>
                        <div>Kamera: $row->kamera</div>";
                        if(login())
                            $dugme = "<input type='submit' value='Ukloni iz korpe' onclick='ukloni($row->id)' />";                        
        echo        "
                    </p>
                    <p>$dugme</p>
                </div>";
    }
}


function upis(string $adress, string $content)
{
    $hendle = fopen($adress, 'a');
    $content = date("Y-d-m H:i:m", time()) . " - $content\r\n";
    fwrite($hendle , $content);
    fclose($hendle);
}

?>