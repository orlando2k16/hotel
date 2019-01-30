<?php
if (isset($_SESSION['username'])) {
require 'conf.php';
  $user = $_SESSION['username'];
  $nume = $nume_useri[$user];

  echo "<h2 id='errl'>sunteti logat, $nume | <a href=login.php?logout=1>Logout!</a></h2><hr/>";
}

// orlando 2017
?>
