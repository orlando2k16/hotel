<?php session_start();
require 'conf.php';
include 'header.php';
include 'logged.php';

$err = false;

$form_cont = <<<FC
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Creare cont nou</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="form">
      <h2>Cont nou</h2>
      <form method="post" action="cont.php">
        <p><input type="text" placeholder="Nume" name="nume"></p>
        <p><input type="text" placeholder="Username" name="username"></p>
        <p><input type="password" placeholder="Password" name="password"></p>
        <p><input type="submit" value="cont nou"></p>
      </form>
    </div>
  </body>
</html>
FC;

// validare

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo "<h1 id='err'>Introduceti datele necesare
    pentru creare unui cont nou! <br/>(toate campurile sunt obligatorii!)</h1>";
    $err = true;
}else{
      if (!isset($_POST['nume']) || !preg_match($regex_nume, $_POST['nume'])) {
        echo "<h1 id='err'>Introduceti un numele complet! <br/></h1>";
        $err = true;
      }elseif (!isset($_POST['username']) || !preg_match($regex_username, $_POST['username'])) {
        echo "<h1 id='err'>Introduceti un username valid! <br/>
        Acesta trebuie sa inceapa cu o litera si sa contina doar litere, cifre si underscore!</h1>";
        $err = true;
      }elseif (!isset($_POST['password']) || !preg_match($regex_password, $_POST['password'])
            || strlen($_POST['password']) <4 ) {
        echo "<h1 id='err'>Introduceti o parola valida! <br/>
        Aceasta trebuie sa fie formata din cel putin 4 caractere dintre care cel putin unul
        sa nu fie litera sau cifra!</h1>";
        $err = true;
      }else{
    if (array_key_exists($_POST['username'], $useri)) {
      echo "<h1 id='err'>Userul exista deja!</h1>";
      $err = true;
    }else{
      $nume = ucwords(str_replace(","," ", $_POST['nume']));
      $file_nume = fopen ("file2.csv", "a");
      $data = $_POST['username'].",".$nume."\n";
      fwrite ($file_nume, $data);
      fclose ($file_nume);

      $file_nume = fopen ("file1.csv", "a");
      $data = $_POST['username'].",".$_POST['password']."\n";
      fwrite ($file_nume, $data);
      fclose ($file_nume);

      echo "<h1 id='err'>contul a fost creat cu succes!</h1>";
      echo "<h1 id='err2'> <a href=login.php> Login! </a> </h1>";
      include 'footer.php';
    }
  }
}

if ($err) {
  echo $form_cont;
  include 'footer.php';
}
// orlando 2017
?>
