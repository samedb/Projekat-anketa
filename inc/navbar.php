<?php
// Ovo mi treba da znam za koji nav-item da stavim acitve
$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="index.php">Anketa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample04">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if ($curPageName === "index.php") echo "active"; ?>">
        <a class="nav-link" href="index.php">Informacije o problemu</a>
      </li>
      <li class="nav-item <?php if ($curPageName === "anketa.php") echo "active"; ?>">
        <a class="nav-link" href="anketa.php">Anketa</a>
      </li>
      <li class="nav-item <?php if ($curPageName === "rezultati.php") echo "active"; ?>">
        <a class="nav-link" href="rezultati.php">Rezultati ankete</a>
      </li>
      <?php
      session_start();
      if (isset($_SESSION["tip_korisnika"]) && $_SESSION["tip_korisnika"] == "admin") {
        $active = ($curPageName === "admin.php" ? "active" : "");
        echo '<li class="nav-item ' . $active . '">
                <a class="nav-link" href="admin.php">Admin</a>
              </li>';
      }
      ?>
    </ul>
    <?php
    if (isset($_SESSION["korisnik"])) {
      $k = $_SESSION["korisnik"];
      echo "<p class='text-light mt-3 mr-3'>Prijavljeni ste kao <b>$k</b></p>";
      echo "<a class='mr-3' href='odjavi_se.php'>Odjavi se</a>";
    } else {
      echo '<a class="btn btn-primary mr-5 my-2" href="login.php">Prijavite se</a>';
    }

    ?>
  </div>
</nav>