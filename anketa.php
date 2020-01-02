<?php
    class Pitanje {
        private $redni_broj;
        private $pitanje;
        private $key;
        private $odgovori;
        private $tip_pitanja;  
        
        public function __construct($rb, $p, $k, $odg, $tip)
        {
            $this->redni_broj = $rb;
            $this->pitanje = $p;
            $this->key = $k;
            $this->odgovori = $odg;
            $this->tip_pitanja = $tip;
        }
        
        public function prikazi_pitanje() {
            echo   "<br><br><div class='container-fluid px-5'>
                        <h3 class='px-3'> $this->redni_broj. $this->pitanje </h3>" .
                        ($this->tip_pitanja == "checkbox" ? "<div class='px-3'> (Mozete odabrati vise odgovora ili nijedan)</div>" : "") .
                        "<div class=' row btn-group btn-group-toggle col-12' data-toggle='buttons'>";

            $col = 4;
            if (count($this->odgovori) == 2)
                $col = 6;
            else if (count($this->odgovori) == 4)
                $col = 3;

            foreach ($this->odgovori as $odg) {
                echo "<div class='btn btn-anketa col-lg-$col border'>
                          <input type='$this->tip_pitanja' name='$this->key' value='$odg' " . ($this->tip_pitanja == "radio" ? "required" : "") . "> $odg
                      </div>";
            }

            echo       "</div>
                    </div>";
        }
    }

    $lista_pitanja = [ new Pitanje(1,  "Koje tipove racunara posedujete?",               "ram",        ["Laptop", "Desktop", "Tablet"],                                                          "checkbox"),
                       new Pitanje(2,  "Za sta sve koristite racunar?",                  "koriscenje", ["Za posao", "Gaming", "Slusanje muzike", "Drustvene mreze", "Surfvoanje po internetu"],  "checkbox"),
                       new Pitanje(3,  "Za sta najcesce koristite racunar?",             "najcesce",   ["Za posao", "Gaming", "Slusanje muzike", "Drustvene mreze", "Surfvoanje po internetu"],  "radio"),
                       new Pitanje(4,  "Operativni sistem?",                             "os",         ["Windows", "Linux", "Mac"],                                                              "checkbox"),
                       new Pitanje(5,  "Koji procesor ima vas racunar?",                 "cpu",        ["Intel", "AMD"],                                                                         "radio"),
                       new Pitanje(6,  "Koliko RAM memorije ima vas racunar?",           "ram",        ["4 GB", "8 GB", "16 GB", "32GB i vise"],                                                 "radio"),
                       new Pitanje(7,  "Graficka kartica?",                              "gpu",        ["Nvidia", "AMD", "Intel"],                                                               "checkbox"),
                       new Pitanje(8,  "Koliko vremena dnevno provodite na racunaru?",   "vreme",      ["1 cas ili manje", "2-3 casa", "3-4 casa", "5 casova ili vise"],                         "radio"),
                       new Pitanje(9,  "Da li koristite vas racunar za igranje igrica?", "igre",       ["Da", "Ne"],                                                                             "radio"),
                       new Pitanje(10, "Koliko godina već radite na racunaru?",          "iskustvo",   ["Do 2 godine", "2-5 godina", "5-10 godina", "10 godina ili vise"],                       "radio"),
                       new Pitanje(11, "Da li sami popravljate racunar?",                "popravka",   ["Ne, nosim ga u servis", "Popravljam neke sitnice", "Resavam sve probleme sam"],          "radio")];
    ?>

<?php include "inc/header.php" ?>

<div align=center>
    <h1>Anketa</h1>
</div>
<form action="test.php" method="get">
    <?php
        foreach ($lista_pitanja as $pitanje) {
            $pitanje->prikazi_pitanje();
        }
        ?>
    <div class="container-fluid px-5 text-center">
        <br>
        <input name="napomena" type="textarea" class="form-control" placeholder="Napomena" aria-label="Username" aria-describedby="basic-addon1">
        <br><br>
        <button type="submit" class="btn-primary btn col-5 text-center padding">Posalji</button>
        <br> <br> <br>
    </div>
</form>

<?php include "inc/footer.php" ?>