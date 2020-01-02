<?php include "inc/header.php" ?>
<h1 align=center>Admin stranica</h1><br>

<?php 
    if (!isset($_SESSION["tip_korisnika"]) || $_SESSION["tip_korisnika"] != "admin") {
        echo "<h3>Ne mozete pristupiti ovim funkcijama!</h3>";
        echo '<a href="index.php">Nazad na pocetnu stranicu</a>';
    } 
    else {
        include_once "inc/dbh.php";
        $dbh = new DBH();
        // Ako ima sta da se brise onda izbrisi
        if (isset($_GET["za_brisanje"])) {
            $za_brisanje = $_GET["za_brisanje"];
            $dbh->query("DELETE FROM anketa WHERE korisnicko_ime = '$za_brisanje'");
        }

        // Uzmi sve ankete iz baze
        $result = $dbh->query("SELECT * FROM anketa;");
        $dbh->close();
?>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>Korisnik</th>
            <th>Tip racunara</th>
            <th>Svrha</th>
            <th>OS</th>
            <th>Iskustvo</th>
            <th>Procesor</th>
            <th>RAM</th>
            <th>Graficka</th>
            <th>Vreme</th>
            <th>Igre</th>
            <th>Popravka</th>
            <th></th>
        </tr>
    </thead>
        <?php 
            while ($row = $result->fetch_assoc()) {
                echo '<tr>
                        <td>' . $row["korisnicko_ime"] . '</td>
                        <td>' . $row["tip"] . '</td>
                        <td>' . $row["koriscenje"] . '</td>
                        <td>' . $row["os"] . '</td>
                        <td>' . $row["iskustvo"] . '</td>
                        <td>' . $row["cpu"] . '</td>
                        <td>' . $row["ram"] . '</td>
                        <td>' . $row["gpu"] . '</td>
                        <td>' . $row["vreme"] . '</td>
                        <td>' . $row["igre"] . '</td>
                        <td>' . $row["popravka"] . '</td>
                        <td><a href="admin.php?za_brisanje=' . $row["korisnicko_ime"] . '">Brisi</a></td>
                      </tr>';
            }
        ?>
</table>


<?php
    }
include "inc/footer.php" 
?>