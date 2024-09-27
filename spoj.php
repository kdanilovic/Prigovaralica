<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="prigovaralica";



$spoj = mysqli_connect($servername, $username, $password, $dbname);


if (!$spoj) {
  die("Spajanje neuspješno: " . mysqli_connect_error());
}

?>