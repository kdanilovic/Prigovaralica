<?php 
include "spoj.php";
session_start();

if (!$spoj) {
    die("Connection failed: " . mysqli_connect_error());
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['ime']) && !empty($_POST['prezime']) && !empty($_POST['username']) && !empty($_POST['email']) 
    && !empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['spol']) && !empty($_POST['birthday'])) {
    
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $spol = $_POST['spol'];
    $birthday = $_POST['birthday'];
    $uloga = "user";

    $response = [];

    $checkUsernameQuery = "SELECT * FROM `korisnici` WHERE `username` = '$username'";
    $checkUsernameResult = mysqli_query($spoj, $checkUsernameQuery);
    if (mysqli_num_rows($checkUsernameResult) > 0) {
        $response['username_zauzet'] = true;
    }

    $checkEmail = "SELECT * FROM `korisnici` WHERE `email` = '$email'";
    $checkEmailResult = mysqli_query($spoj, $checkEmail);
    if (mysqli_num_rows($checkEmailResult) > 0) {
        $response['email_zauzet'] = true;
    }

    else{
        $sql = "INSERT INTO `korisnici`(`ime`, `prezime`, `username`, `email`, `lozinka`, `uloga`, `spol`, `birthday` )
        VALUES ('$ime','$prezime','$username','$email', '$password', '$uloga', '$spol', '$birthday')";
        $q = mysqli_query($spoj, $sql);

    

        if ($q) {
            $response = array("success" => true, "message" => "Uspješna registracija!");
        } else {
            $response = array("success" => false, "message" => "Error: " . mysqli_error($spoj));
        }
    }   
} 
    

echo json_encode($response);

?>