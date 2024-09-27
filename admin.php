<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administratorska prava</title>
    <link rel="icon" href="os_logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/all.css">
</head>
<body class="bg">
    <main>

    <?php
        include "spoj.php";
     
    ?>

    <?php require_once("nav.php"); ?>
        <?php 
            if($_SESSION['uloga']!="admin"){
                header("Location: /prigovaralica");
            }
        ?>

    <div class="container d-flex justify-content-center mb-5 mt-5">
        <button id="btn_profil" type="button" class="btn btn-lg btn-light" onclick="prikaziKorisnike()">KORISNICI</button>
        <button id="btn_objave" type="button" class="btn btn-lg btn-dark" onclick="prikaziObjave()">OBJAVE</button>
    </div>

<div id = "tabla_korisnika" class="container mt-5 mb-5 table-responsive">
    <table class="table text-white bg-dark text-center">
        <thead>
            <th>ID</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Korisničko ime</th>
            <th>Email</th>
            <th>Spol</th>
            <th>Datum rođenja</th>
            <th></th>
        </thead>
        <tbody>


        <?php

        $sql = "SELECT * FROM `korisnici`";
        $result = mysqli_query($spoj, $sql);

        if(!$result){
            die("Invalid!");
        }

        while($redak = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      echo "
            <tr>
                <td>$redak[id]</td>
                <td>$redak[ime]</td>
                <td>$redak[prezime]</td>
                <td>$redak[username]</td>
                <td>$redak[email]</td>
                <td>$redak[spol]</td>
                <td>$redak[birthday]</td>
                <td>
                <a class='btn btn-outline-danger' href='obrisi_profil.php?id=$redak[id]'>Izbriši profil</a>
                </td> 
            </tr>
            ";
        }
            ?>
            
        </tbody>

    </table>

    </div>

    




    <div hidden id = "tabla_objava" class="container mt-5 mb-5 table-responsive">
    <table class="table text-white bg-dark text-center ">
        <thead>
            <th>ID</th>
            <th>Autor</th>
            <th>Naslov</th>
            <th>Opis</th>
            <th>Broj lajkova</th>
            <th>Broj dislajkova</th>
            <th>Broj komentara</th>
            <th></th>
        </thead>
        <tbody>


        <?php

        $sql = "SELECT * FROM `objave`";
        $result = mysqli_query($spoj, $sql);

        if(!$result){
            die("Invalid!");
        }

        while($redak = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      echo "
            <tr>
                <td>$redak[id]</td>
                <td>$redak[autor]</td>
                <td>$redak[naslov]</td>
                <td>$redak[opis]</td>
                <td>$redak[lajk]</td>
                <td>$redak[dislajk]</td>
                <td>$redak[komentari]</td>
                <td>
                <a class='btn btn-outline-danger' href='obrisi_objavu.php?id=$redak[id]'>Izbriši objavu</a>
                </td> 
            </tr>
            ";
        }
            ?>
            
        </tbody>

    </table>

    </div>




    </main>
    <?php require_once("footer.html"); ?>

    <script>
           <?php 
            $is_admin = ($_SESSION['uloga']==='admin') ? true : false;
        ?>
        
        is_admin = <?php echo json_encode($is_admin); ?>;
    </script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="script3.js"></script>
<script>

    document.getElementById("nav_admin").classList.add("active");
</script>

</body>
</html>