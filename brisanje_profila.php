<?php

include "spoj.php";
session_start();

$k_ime = $_SESSION['username'];


if(isset($_POST['password'])){

    $pass = $_POST['password'];

    if($pass==$_SESSION['lozinka']){
        $sql = "DELETE FROM `korisnici` WHERE username='".$k_ime."' ";
        $result = mysqli_query($spoj,$sql);
        $_SESSION['prijavljen']=false;
        
        $response = 1;
        echo $response;
       
    }
}








?>