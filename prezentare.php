<?php session_start();

include 'header.php';
include 'logged.php';

$cam = <<<CAM

  <div class="cam">
          <img class="camera" src='single.jpg'>
          <p class="prez">Camera single reprezinta o camera cu mobila moderna, pat, noptiere, camera de baie cu cabina de dus
            si toate lucrurile necesare unui calator modern. Camera este dotata cu:
            Internet wi-fi gratuit, telefon, tv prin satelit cu peste 600 canale,
            Aer conditionat si sistema de incalzire autonoma,
            Mini-bar, Cabina de dus, accesorii de baie, uscator de par.</p>
          <p class="prez">Pretul unei camere single este de 70 euro pe noapte.</p>
  </div>
  <div class="cam">
          <img class="camera" src='double.jpg'>
          <p class="prez">Camera dubla reprezinta o camera cu pat matrimonial, mobila moderna,
            noptiere si camera de baie echipata cu toate lucrurile necesare.
            Patul matrimonial ofera un comfort deosebit pentru un cuplu ideal.
            Aceasta camera este dotata cu: Internet wi-fi gratuit, telefon,
            tv prin satelit cu peste 600 canale, Aer conditionat si sistema de incalzire autonoma,
            Mini-bar, accesorii de baie, uscator de par.</p>
          <p class="prez">Pretul unei camere duble este de 85 euro pe noapte.</p>
  </div>
  <div class="cam">
          <img class="camera" src='apartament.jpg'>
          <p class="prez">Fiecare apartament este compus din doua camere spatioase
            separate de un hol: un dormitor cu un pat matrimonial si un living generos.
            Micul dejun pentru 2 persoane este inclus in pret!</p>
          <p class="prez">Pretul unui apartament este de 120 euro pe noapte.</p>
  </div>

CAM;

echo $cam;

include 'footer.php';

// orlando 2017
?>
