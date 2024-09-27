<?php 
include "spoj.php";
session_start();

$k_ime = $_SESSION['username'];

if( $_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['ime'] ) && !empty( $_POST['prezime'] ) &&
!empty($_POST['email']) ){

 
  $novo_ime = $_POST['ime'];
  $novo_prezime = $_POST['prezime'];
  $novi_email = $_POST['email'];

  $sql = "UPDATE `korisnici` SET `ime`='".$novo_ime."',`prezime`='".$novo_prezime."',
  `email`='".$novi_email."' WHERE username='".$k_ime."'";

  $result = mysqli_query($spoj,$sql);
  
  if(!$result){  
    echo "Error: " . mysqli_error($spoj);
  }

  else{
    $response = "Uspijesno promjenjene postavke!";

  }
  
}


?>