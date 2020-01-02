<?php include "inc/header.php" ?>

<?php
$greska = "";
if (isset($_POST["ime"]) && isset($_POST["prezime"]) && isset($_POST["email"]) && isset($_POST["korisnicko_ime"]) && isset($_POST["lozinka1"]) && isset($_POST["lozinka2"])) {
    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $email = $_POST["email"];
    $korisnicko_ime = $_POST["korisnicko_ime"];
    $lozinka1 = $_POST["lozinka1"];
    $lozinka2 = $_POST["lozinka2"];
    $adresa = "";
    if (isset($_POST["adresa"]))
        $adresa = $_POST["adresa"];
    $jmbg = "";
    if (isset($_POST["JMBG"]))
        $jmbg = $_POST["JMBG"];
    $telefon = "";
    if (isset($_POST["telefon"]))
        $telefon = $_POST["telefon"];

    // proveravamo da li je sve ispravno
    try {
        include_once "inc/dbh.php";
        $dbh = new DBH();
        $result = $dbh->query("SELECT * FROM Korisnik WHERE korisnicko_ime = '$korisnicko_ime';");
        if ($result->num_rows > 0) 
            throw new Exception("Ovo korisnicko ime je vec zauzeto!");

        $result = $dbh->query("SELECT * FROM Korisnik WHERE email = '$email';");
        if ($result->num_rows > 0) 
            throw new Exception("Na ovom emailu je vec registrovan jedan nalog!");

        if ($lozinka1 != $lozinka2)
            throw new Exception("Lozinke koje ste uneli se ne poklapaju!");

        $dbh->query("INSERT INTO Korisnik VALUES ('$korisnicko_ime', '$ime', '$prezime', '$email', '$lozinka1', '$adresa', '$jmbg', '$telefon', 'korisnik');");
        header("Location:uspesno_kreiran_nalog.php");
    } catch (Exception $e) {
        $greska = $e->getMessage();
    }
    $dbh->close();
}

?>

<form action="" method="post" class="mx-5">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Ime*</label>
            <input type="text" class="form-control" name="ime" placeholder="Ime" required>
        </div>
        <div class="form-group col-md-6">
            <label>Prezime*</label>
            <input type="text" class="form-control" name="prezime" placeholder="Prezime" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Email*</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group col-md-6">
            <label>Korisnicko ime*</label>
            <input type="text" class="form-control" name="korisnicko_ime" placeholder="Korisnicko ime" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Lozinka*</label>
            <input type="password" class="form-control" name="lozinka1" placeholder="Lozinka" required>
        </div>
        <div class="form-group col-md-6">
            <label>Ponovite lozinku*</label>
            <input type="password" class="form-control" name="lozinka2" placeholder="Lozinka" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Adresa</label>
            <input type="text" class="form-control" name="adresa" placeholder="Adresa">
        </div>
        <div class="form-group col-md-3">
            <label>JMBG</label>
            <input type="text" class="form-control" name="JMBG" placeholder="JMBG">
        </div>
        <div class="form-group col-md-3">
            <label>Broj telefona</label>
            <input type="text" class="form-control" name="telefon" placeholder="Broj telefona">
        </div>
    </div>
    <small>Polja koja su oznacena sa * su obavezna</small>
    <?php
        if ($greska != "")
            echo    '<div class="text-center">
                        <p class="text-center text-danger">' . $greska . '</p>
                    </div>';
    ?>
    <br><br>
    <div class="text-center">
        <button type="submit" class="btn btn-primary col-4">Registruj se</button>
    </div>
</form>

<?php include "inc/footer.php"; ?>