<?php
session_start ();
require 'conf.php';

$form = <<<FORM
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="form">
      <h2>Log in</h2>
      <form method="post" action="login.php">
        <p><input type="text" placeholder="Username" name="username"></p>
        <p><input type="password" placeholder="Password" name="password"></p>
        <p><input type="submit" value="Log in"></p>
        <p><a href="cont.php"><input type="button" value="Cont nou" href></a></p>
      </form>
    </div>
  </body>
</html>
FORM;

// desfiintam sesiunea in caz de logout

if (isset($_GET['logout'])) {
  setcookie (session_name(), "", time()-10000);
  session_destroy();
  include 'header.php';
  echo $form;
}else {
  if (isset($_SESSION['username'])) {
    include 'header.php';
    include 'logged.php';
    echo "<p id='re5'>Sunteti deja logat!</p>";
  }else{
      if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $showform = true;
      } else {
                if (empty($_POST['username']) || empty($_POST['password'])) {
                  $mesaj = "<h1 id='err'>Introduceti user si parola!</h1>";
                  $showform = true;
                } else {
                          if (!array_key_exists($_POST['username'], $useri) || $useri[$_POST['username']] !== $_POST['password']) {
                          $mesaj = "<h1 id='err'>Autentificare esuata!</h1>";
                          $showform = true;
                           }else {
                                $_SESSION['username'] = $_POST['username'];
                                header('Location: home.php');
                                exit;
                              }
                     }
             }
      }
}

if (!empty($showform)) {
  include 'header.php';
  echo $form;
}

if (!empty($mesaj)) {
  echo $mesaj;
}

include 'footer.php';

// orlando 2017
?>
