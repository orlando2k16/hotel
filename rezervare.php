<?php session_start();
include 'header.php';
include 'logged.php';
require 'conf.php';

$err = false;

$form_rezervare = <<<FREZ

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rezervare</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="form">
      <h2>Rezervare</h2>
      <form method="post" action="rezervare.php">
        <p>Tipul camerei:</p>
        <p><select class="" name="tip">
          <option value="single">single</option>
          <option value="double">double</option>
          <option value="apartament">apartament</option>
        </select></p>
        <p><input type="text" placeholder="numar de nopti" name="nr_nopti"></p>
        <p>modalitatea de plata:</p>
        <p><select name="plata">
          <option value="integral">integral</option>
          <option value="rate">rate</option>
        </select></p>
        <p><input type="text" placeholder="numar de rate" name="nr_rate"></p>
        <p><input type="submit" value="rezervare"></p>
      </form>
    </div>
  </body>
</html>
FREZ;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $err = true;
}else {
  if (!isset($_POST['nr_nopti']) || !is_numeric($_POST['nr_nopti'])) {
    echo "<h1 id='err'>Introduceti numarul de nopti!</h1>";
    $err = true;
  }elseif ($_POST['nr_nopti'] >90 ) {
    echo "<h1 id='err'>Pentru a rezerva pentru o perioada mai mare de 90 de zile adresati-va
    consultantiilor de vanzari prin formularul din pagina contact!</h1>";
    $err = true;
  }else{
    if ($_POST['plata'] === 'integral'){
          $preti = $_POST['nr_nopti']*$pret_camere[$_POST['tip']];
          echo "<p id='re'>Ati rezervat o camera ".$_POST['tip']." pentru ".$_POST['nr_nopti']." nopti!</p>";
          echo "<p id='re'>Pretul camerei este de $preti EUR</p>";
          echo "<p id='re2'>Iar plata se va face integral.</p>";
          include 'footer.php';
        }
        else {
          if (!isset($_POST['nr_rate']) || !is_numeric($_POST['nr_rate'])) {
                echo "<h1 id='err'>Introduceti numarul de rate!</h1>";
                $err = true;
        }else{
          $pretr = $_POST['nr_nopti']*$pret_camere[$_POST['tip']];
          echo "<p id='re'>Ati rezervat o camera ".$_POST['tip']." pentru ".$_POST['nr_nopti']." nopti!</p>";
          echo "<p id='re'>Suma totala de plata este $pretr EUR!</p>";
          echo "<p id='re'>Plata se va face in ".$_POST['nr_rate']." rate!</p>";
          echo "<p id='re2'>Valoarea unei rate este de ".$pretr/$_POST['nr_rate']." EUR!</p>";
          include 'footer.php';
        }
        }
  }
  }

if (!isset($_SESSION['username'])){
  echo "<div class='cam'>
          <img class='rezer' src='b3.jpg'>
          <p class='rezer'>Pentru a avea acces la sectiunea rezervari va rugam sa
          va logati. <br><a class='rezer' href=login.php>--> Login <--</a></p>
        </div>";
        include 'footer.php';
      }else {
        if ($err) {
          echo $form_rezervare;
          include 'footer.php';
      }
}

// orlando 2017
?>
