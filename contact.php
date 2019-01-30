<?php session_start();
require 'conf.php';
include 'header.php';
include 'logged.php';

    if (isset($_SESSION['username'])) {
     $user = $_SESSION['username'];
     $nume = $nume_useri[$user];
   }else {
     $nume = "";
   }

$err = false;

$form_contact = <<<FCON
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>Contact</title>
        <link rel="stylesheet" href="style.css">
      </head>
      <body>
    <div class="form">
      <h2>Contact</h2>
      <form method="post" action="contact.php">
        <p><input type="text" placeholder="nume" name="nume" value=
        $nume>
        </p>
        <p><input type="text" placeholder="mail" name="mail"></p>
        <p><input type="text" placeholder="telefon" name="telefon"></p>
        <h3>De unde ati aflat de siteul nostru:</h3>
        <p><select name="sursa">
            <option value="prieten">prieten</option>
            <option value="net">internet</option>
            <option value="rezervari">siteuri rezervari</option>
            <option value="alte">alte surse</option>
        </select>
        </p>
        <p><textarea name="mesaj" placeholder="intrebarea dumneavoastra" rows="8" cols="54"></textarea></p>
        <p><input type="submit" value="Trimite mesajul"></p>
      </form>
    </div>
  </body>
</html>
FCON;

// validare

if ($_SERVER['REQUEST_METHOD'] ==='GET') {
  $err = true;
  echo "<h1 id='err'>Adresati o intrebare echipei noastre! <br/>(toate campurile sunt obligatorii!)</h1>";
}else {
  if (!isset($_POST['nume']) || !preg_match($regex_nume, $_POST['nume'])) {
    echo "<h1 id='err'>Introduceti un nume valid!</h1>";
    $err = true;
  }
  elseif (!isset($_POST['mail']) || !preg_match($regex_mail, $_POST['mail'])) {
    echo "<h1 id='err'>Introduceti un mail valid!</h1>";
    $err = true;
  }
  elseif (!isset($_POST['telefon']) || !preg_match($regex_telefon, $_POST['telefon'])) {
    echo "<h1 id='err'>Introduceti un numar de telefon valid!</h1>";
    $err = true;
  }
  elseif (!isset($_POST['mesaj'])) {
    echo "<h1 id='err'>Introduceti un mesaj!</h1>";
    $err = true;
  } else {
    $file_mesaje = fopen("mesaje.csv", "a");
    fputcsv ($file_mesaje, $_POST);
    fclose ($file_mesaje);
    echo "<h1 id='err'>Va multumim pentru interes.
    Veti fi contactat in cel mai scurt timp de unul din consultantii nostri
    de vanzari.
          </h1>";
    echo "<h1 id='err2'> <a href=contact.php> Reveniti la pagina de contact </a> </h1>";

    include 'footer.php';
  }
}


if ($err) {
    echo $form_contact;
    include 'footer.php';
}

// orlando 2017
?>
