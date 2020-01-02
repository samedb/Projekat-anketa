<?php include "inc/header.php" ?>

<?php

$greska = false;

if (isset($_POST["korisnickoIme"]) || isset($_POST["lozinka"])) {
    include_once "inc/dbh.php";
    $korisnickoIme = $_POST["korisnickoIme"];
    $lozinka = $_POST["lozinka"];

    $dbh = new DBH();
    $rez = $dbh->query("SELECT * FROM Korisnik WHERE korisnicko_ime = '$korisnickoIme' AND lozinka = '$lozinka';");
    $dbh->close();

    if ($rez->num_rows > 0) {
        $row = $rez->fetch_assoc();
        //echo "Broj najdenih: " . $row["COUNT(*)"];

        if (!isset($_SESSION))
            session_start();
        $_SESSION["korisnik"] = $korisnickoIme;
        $_SESSION["tip_korisnika"] = $row["tip_korisnika"];
        header("Location:index.php");
    } else {
        $greska = true;
    }
}

?>
<div class="text-center col-xs-12 col-md-6 col-lg-4" style=" margin:auto;">
    <h1>Prijava</h1><br>
    <form action="login.php" method="POST">
        <div class="form-group text-left">
            <label>Korisnicko ime</label>
            <input type="text" class="form-control" name="korisnickoIme" autofocus>
        </div>
        <div class="form-group text-left">
            <label>Lozinka</label>
            <input type="password" class="form-control" name="lozinka">
        </div>
        <?php
        if ($greska)
            echo "<p class='text-danger'>Neispravno korisnicko ime ili lozinka!</p>"
        ?>
        <a href="$">Zaboravio sam lozinku</a><br><br>
        <button type="submit" class="btn btn-primary">Prijavi se</button>
    </form>
    <br>Nemate nalog? <a href="registracija.php">Registrujte se</a><br>
</div>
<?php include "inc/footer.php" ?>