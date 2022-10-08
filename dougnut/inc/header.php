
<?php include('func/functions.php'); ?>
<?php logout(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="style/stil.css">
    <title>Document</title>
</head>
<body>

    <?php if(!login()): ?>

        <form method="post">
            <fieldset>
                <legend>Login</legend>
                <table>
                    <tr>
                        <td>Korisnicko ime: </td>
                        <td><input type="text" name="user" id="user"></td>
                    </tr>
                    <tr>
                        <td>Lozinka: </td>
                        <td><input type="password" name="pass" id="pass"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="btnLogin" id="btnLogin"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <div class="odgovor">
            <?php loginUser(); ?>
        </div>

    <?php else: ?>
        
        <div class="prijavljen">
            <h3>Dobrodosli |<?php echo $_SESSION['korisnik']; ?> (<?php echo $_SESSION['status']; ?>)</h3>
            <p>
                    <?php if($_SESSION['status'] == "kupac"): ?>
                        <a href="index.php">Pocetna</a> |
                    <?php endif; ?>

                    <?php if($_SESSION['status'] == "radnik"): ?>
                        <a href="radnik.php">Narudzbine</a> |
                    <?php endif; ?>
                    
                <a href="index.php?odjava">Odjava</a>
            </p>
        </div>

    <?php endif; ?>
    
