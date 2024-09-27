<?php

include "spoj.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM `korisnici` WHERE id = $id";
    $result = mysqli_query($spoj,$sql);

    header("Location: /prigovaralica/admin.php");
}


?>