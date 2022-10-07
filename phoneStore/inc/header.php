<?php include('func/functions.php'); ?>
<?php logout(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>VISER, Phone Store</title>
</head>
<body>

    <?php if(!login()): ?>
            <table class="forma">
                <tr>
                    <td>Unesite email</td>
                    <td><input type="email" name="user" id="user"></td>
                </tr>
                <tr>
                    <td>Unesite lozinku</td>
                    <td><input type="password" name="pass" id="pass"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Prijavi se" name="btnPrijava" id="btnPrijava"></td>
                </tr>
            </table>
            <div id="odgovor"></div>
    
    <?php else: ?>

        <div class="prijavljen">
            <h3>Dobrodosli | <?php echo $_SESSION['korisnik']; ?> </h3>
            <p>
                <a href="index.php">Pocetna</a> |
                <a href="korpa.php">Korpa</a> |
                <a href="index.php?odjava">Odjava</a>
            </p>
        </div>

    <?php endif; ?>