<?php include "inc/header.php" ?>
    
<?php
try {
    $tip = implode(",", $_POST["tip"]);
    $koriscenje = implode(",", $_POST["koriscenje"]);
    $os = implode(",", $_POST["os"]);
    $iskustvo = $_POST["iskustvo"];
    $cpu = $_POST["cpu"];
    $ram = $_POST["ram"];
    $gpu = implode(",", $_POST["gpu"]);
    $vreme = $_POST["vreme"];
    $igre = $_POST["igre"];
    $popravka = $_POST["popravka"];
    $napomena = $_POST["napomena"];

    $korisnik = $_SESSION["korisnik"];

    include "inc/dbh.php";
    $dbh = new DBH();
    $dbh->query("INSERT INTO `anketa` (`korisnicko_ime`, `tip`, `koriscenje`, `os`, `iskustvo`, `cpu`, `ram`, `gpu`, `vreme`, `igre`, `popravka`, `napomena`) 
                 VALUES ('$korisnik', '$tip', '$koriscenje', '$os', '$iskustvo', '$cpu', '$ram', '$gpu', '$vreme', '$igre', '$popravka', '$napomena');");
    $dbh->close();
    echo "<h1>Anketa uspesno uneta</h1>";
} catch (Exception $e) {
    echo "<h1>Greska prilikom unosa ankete</h1>";
}

echo "<a href='index.php'>Nazad na pocetnu</a>";

?>

<?php include "inc/footer.php" ?>