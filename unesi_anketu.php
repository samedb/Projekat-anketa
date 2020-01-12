<?php include "inc/header.php" ?>
    
<?php


function da_li_je_sumnjiv() {
    include "inc/Pitanje.php";
    // sume_odgovora broji koliko puta je dat odgovor po a, pod b...
    // ako je npr. pod a odgovoreno onoliko puta koliko ima pitanja onda je to sumnjivo popunjena anketa
    $sume_odgovora = array_fill(0, 10, 0);
    foreach ($lista_pitanja as $key => $value) {
        if ($value->tip_pitanja == "radio") {
            $indeks = array_search($_POST[$value->key], $value->odgovori); // nadji indeks odogovora
            $sume_odgovora[$indeks]++;
        } 
        else if ($value->tip_pitanja == "checkbox") {
            $kljuc = substr($value->key, 0, strlen($value->key) - 2); // uklanjam [] na kraju kljuca
            foreach ($_POST[$kljuc] as $v) {
                $indeks = array_search($v, $value->odgovori); // nadji indeks odogovora
                $sume_odgovora[$indeks]++;
            }
        }
    }
    
    $broj_pitanja = count($lista_pitanja);
    foreach ($sume_odgovora as $broj) {
        if ($broj == $broj_pitanja)
            return true;
    }
    return false;
}

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
    $sumnjiv = da_li_je_sumnjiv();

    $korisnik = $_SESSION["korisnik"];

    include "inc/db.php";
    izvrsi_upit("INSERT INTO `anketa` (`korisnicko_ime`, `tip`, `koriscenje`, `os`, `iskustvo`, `cpu`, `ram`, `gpu`, `vreme`, `igre`, `popravka`, `napomena`, `sumnjiv`) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);", "ssssssssssssi", 
                 $korisnik, $tip, $koriscenje, $os, $iskustvo, $cpu, $ram, $gpu, $vreme, $igre, $popravka, $napomena, $sumnjiv);

    echo "<h1>Anketa uspesno uneta</h1>";
} catch (Exception $e) {
    echo "<h1>Greska prilikom unosa ankete</h1>";
}

echo "<a href='index.php'>Nazad na pocetnu</a>";

?>

<?php include "inc/footer.php" ?>