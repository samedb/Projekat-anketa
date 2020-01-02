<?php include "inc/Pitanje.php" ?>

<?php include "inc/header.php" ?>

<div align=center>
    <h1>Anketa</h1>
</div>

<?php
    function da_li_je_uneta_anketa($korisnicko_ime) {
        include_once 'inc/db.php';
        $result = izvrsi_upit("SELECT * FROM anketa WHERE korisnicko_ime = '$korisnicko_ime';");
        return $result->num_rows > 0;
    }

    if (!isset($_SESSION["korisnik"])) {
        echo '  <div align=center>
                    <h3>Morate da se prijavite da bi ste popunjavali anketu</h3>
                    <a class="btn btn-primary mr-5 my-2" href="login.php">Prijavite se</a>
                </div>';
    } 
    else if (da_li_je_uneta_anketa($_SESSION["korisnik"])) {
        echo "  <div align=center>
                    <h3>Vec ste popunili anketu!</h3>
                    <a href='index.php'>Nazad na pocetnu</a>
                </div>";
    }
    else {
        echo '<form action="unesi_anketu.php" method="POST">';
        foreach ($lista_pitanja as $pitanje) 
            $pitanje->prikazi_pitanje();
        echo '  <div class="container-fluid px-5 text-center">
                    <br>
                    <input name="napomena" type="textarea" class="form-control" placeholder="Napomena" aria-label="Username" aria-describedby="basic-addon1">
                    <br><br>
                    <button type="submit" class="btn-primary btn col-5 text-center padding">Posalji</button>
                    <br> <br> <br>
                </div>
            </form>';
    }
?>


<?php include "inc/footer.php" ?>