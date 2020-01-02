<!-- Za grafikone sam koristio EasyPHPCharts library sa githuba: https://github.com/AntoineAugusti/EasyPHPCharts-->

<?php
include "inc/Chart.php";
include "inc/header.php";
include "inc/Pitanje.php";
include "inc/db.php";

// Uzimam sve rezultate anketa iz tabele anketa
;
$result = izvrsi_upit("SELECT * FROM anketa;");

$matrica = null;

// Javlja mi milion warninga bez ovoga jer dinamicki dodajem u $matrica atribute
error_reporting(error_reporting() & ~E_NOTICE);

// prebrojim ih i stavim ih u $matrica
while ($row = $result->fetch_assoc()) {
    foreach ($row as $key => $atribut) {
        if ($key != "korisnicko_ime" && $key != "napomena")
            foreach (explode(",", $atribut) as $value) {
                $matrica[$key][$value]++;
            }
    }
}
?>

<link rel="stylesheet" href="css/chart.css">
<script src="inc/ChartJS.min.js"></script>

<h1 align=center>Rezultati ankete</h1><br>
<div class="container" style=" margin:auto;">
    <div class="row">
        <?php
        // Prikazujem sve chartove
        $i = 0;
        foreach ($matrica as $key => $atribut) {
            $PieChart = new Chart('pie', $key);
            $PieChart->set('data', array_values($atribut));
            $PieChart->set('legend', array_keys($atribut));
            $PieChart->set('displayLegend', true);

            echo "<div class='col-md-12 col-lg-6'>";
            echo "<h3>" . $lista_pitanja[$i++] . "</h3>";
            echo $PieChart->returnFullHTML();
            echo "</div>";
        }
        ?>
    </div>
</div>

<?php include "inc/footer.php" ?>