<?php include('inc/header.php'); ?>

<hr>
    <h1 align="center">Pocetna</h1>
<hr>
<img class="slika" src="img/baner.jpg" alt="krofneee">
<!-- Jebiga ne mogu da nadjem bolju sliku...-->

<?php if(login() and $_SESSION['status'] == "kupac"): ?>

    <h3 align="center">Narucite odmah!</h3>

    <form method="post" onsubmit="return false">
    <div class="forma">
        <table>
            <tr>
                <td>Ime: </td>
                <td><input type="text" name="ime" id="ime"></td>
                <td>Prezime: </td>
                <td><input type="text" name="prezime" id="prezime"></td>
            </tr>
            <tr>
                <td>Adresa: </td>
                <td><input type="text" name="adresa" id="adresa"></td>
                <td>Postanski broj: </td>
                <td><input type="text" name="pbroj" id="pbroj"></td>
            </tr>
            <tr>
                <td colspan="2">Nacin placanja: </td>
                <td>
                    <select name="nacin" id="nacin">
                        <option value="1">Kes</option>
                        <option value="2">Kartica</option>
                    </select>
                </td>
            </tr>
        </table>
    </div>


    <br>
    <hr>

    <div class="row">
        <div class="velicina">
            <h4>Ponude</h4>
            <br>
            <?php ponude(); ?>
        </div>
            <br>
            <!--<input type="checkbox" name="dodaci[]" id="nutela"><label for="nutela">Nutela</label><br>
            <input type="checkbox" name="dodaci[]" id="visnja"><label for="visnja">Visnja</label><br>
            <input type="checkbox" name="dodaci[]" id="plazma"><label for="plazma">Plazma</label><br>
            <input type="checkbox" name="dodaci[]" id="kokos"><label for="kokos">Kokos</label><br>
            <input type="checkbox" name="dodaci[]" id="coko"><label for="coko">Coko mrvice</label><br>
            <input type="checkbox" name="dodaci[]" id="twix"><label for="twix">Twix</label><br>
            <input type="checkbox" name="dodaci[]" id="banana"><label for="banana">Banana</label><br>--> 
            
        </div>
    </div>
<br>
    <div align="center"><input type="submit" name="btnPoruci" id="btnPoruci" value="Poruci"></div>
<br>

    <div align="center" id="narudzbina">
        <?php createAnOrder(); ?>
    </div>
<hr>
    </form>
    

    <?php else: ?>

        <h2 align="center">Morate biti prijavljeni kako biste porucili svoju omiljenu krofnu!</h2>

    <?php endif; ?>

<?php include('inc/footer.php'); ?>