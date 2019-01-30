<?php
session_start ();
  include 'header.php';
  include 'logged.php';

$home = <<<HOM
<div class="img">
        <img src='b1.jpg'>
        <p class="h">Luminos şi modern, hotelul Bucharest Grand Hotel *****
           vă aduce direct în centrul financiar al oraşului.
           Este amplasat la o distanţa de numai 10 minute de mers până în centrul istoric,
           unde vă puteţi bucura de o multitudine de cafenele, magazine şi muzee.
        <p class="h">Camerele hotelului, confortabile şi moderne,
           sunt decorate în culori calde care contrastează cu albul impecabil al
           aşternuturilor. Ferestrele sunt bine izolate fonic asigurând un somn liniştit şi
           odihnitor. In plus, toate camerele au internet Wi-Fi gratuit. </p>
</div>
HOM;

echo $home;

include 'footer.php';

// orlando 2017
?>
