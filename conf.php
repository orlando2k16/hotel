<?php

// citire date din fisiere

$file = fopen("file1.csv", "r");
while (!feof($file)) {
          $data1 = fgetcsv($file);
          $num1 = $data1[0];
          $pas1 = $data1[1];
          $useri[$num1] = $pas1;
}
fclose($file);

$file = fopen("file2.csv", "r");
while (!feof($file)) {
          $data2 = fgetcsv($file);
          $num2 = $data2[0];
          $pas2 = $data2[1];
          $nume_useri[$num2] = $pas2;
        }
fclose($file);

// array cu preturile camerelor

$pret_camere = array('single' => 70,
                     'double' => 85,
                     'apartament' => 120, );

// regexuri

$regex_nume = '/^([a-zA-Z][a-z]{2,}[ ,])+[a-zA-Z][a-z]{2,}$/';
$regex_username = '/^[a-zA-Z]\w{2,}$/';
$regex_password = '/[\W_]/';
$regex_telefon ='/^((00|\+)?4)?0\d{9}$/';
$regex_mail = '/^[\w\-\.]+@([a-z\-]+\.)+[a-z\-]+$/';

// orlando 2017
?>
