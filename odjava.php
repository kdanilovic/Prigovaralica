<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odjava</title>
    
</head>
<body>
    <?php
        include "spoj.php";
        session_start();
        unset($_SESSION['id']);
        unset($_SESSION['username1']);
        unset($_SESSION['ime']);
        unset($_SESSION['prezime']);
        unset($_SESSION['email']);
        unset($_SESSION['lozinka']);
        unset($_SESSION['uloga']);
        unset($_SESSION['spol']);
        unset($_SESSION['birthday']);
        unset($_SESSION['timeout']);
        $_SESSION['prijavljen']=false;
        header("Location: index.php");
    ?>


</body>
</html>