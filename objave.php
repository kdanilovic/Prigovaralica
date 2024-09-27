<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objave</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="icon" href="os_logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/all.css">
</head>
<body class="bg">
<main>
<?php require_once("nav.php"); ?>
<?php require_once("kreiraj_objavu.php"); ?>
    
    <div class="container bg-light sticky-top w-75 rounded mb-5 mt-5 shadow-lg">
        <div class="row">
            <div class="col d-flex align-items-center justify-content-end"><a href="#foot2"><i class="fa-solid fa-arrow-down-short-wide hover-zoom" style="color: #000000;"></i></div></a>
            <div class="col text-center mb-2 mt-2">
                    <a class="text-dark me-2" href="?order=vrijeme&asc_desc=DESC">Najnovije</a>
                    <a class="text-dark me-2" href="?order=lajk&asc_desc=DESC">Najpopularnije</a>
                    <a class="text-dark me-2" href="?order=vrijeme&asc_desc=ASC">Najstarije</a>
            </div>
            <div class="col d-flex align-items-center justify-content-left "><a href="#"><i class="fa-solid fa-arrow-up-wide-short hover-zoom" style="color: #000000;"></i></div></a>
        </div>
    </div>




    <?php

    include "spoj.php";


    $order = isset($_GET['order']) ? $_GET['order'] : 'vrijeme';
    $asc_desc = isset($_GET['asc_desc']) ? $_GET['asc_desc'] : 'DESC';
    $sql = "SELECT * from objave ORDER BY $order $asc_desc";
    $q = mysqli_query($spoj, $sql);


    while($red = mysqli_fetch_assoc($q)){
        echo "
        <a href='objava.php?id=$red[id]' class='text-white'>
    ";
        ?>  
  
<div class="mb-5 bg-dark text-white container rounded w-75 shadow-lg h-100 hover-zoom">
            <div class="mb-2">
                <h1 class="h3 text-center"><?php echo $red['naslov']; ?></h1>
                <hr class="hr hr-blurry" />
            </div>
            <div class="mb-3"><p class="fs-6 lh-lg fw-bold">Autor: <?php echo $red['autor']; ?></p></div>
            
            <div class="mb-2">
                <?php 
                if($red['slika']){
                    ?>
                    <img src="./image/<?php echo $red['slika']; ?>" style="max-height: 200px; max-width: 200px;" class="img-fluid">
                <?php } ?>


            </div>
            <div class="mb-4 ms-5"><p class="fs-6 lh-lg"><?php echo substr($red['opis'], 0, 120);?>....</p></div>
            <div class="mb-3 text-end"><p>Objavljeno: <?php echo date('d.m.Y H:i:s', strtotime($red['vrijeme'])); ?></p></div>
            <div>
            </a> 
            <span id="like_count_<?php echo $red['id'];?>"><?php echo $red['lajk'];?></span><i class="fa fa-thumbs-up ms-1 lajk-ikona" onclick="likePost(<?php echo $red['id']; ?>, userID)"></i>
                    <span>
                    <span id="dislike_count_<?php echo $red['id'];?>" class="ms-4"><?php echo $red['dislajk'];?></span><i class="fa fa-thumbs-down ms-1 dislajk-ikona" onclick="dislikePost(<?php echo $red['id']; ?>, userID)" ></i>
                    <span class="ms-4" ><?php 
                    echo "
                    <a href='objava.php?id=$red[id]' class='text-white'>
                    ";?>
                    <?php echo $red['komentari'];?><i class="fa-solid fa-comment ms-1 komentar-ikona"></i></span>
                    </span>
            </div>
        </div>
       

    <?php
    }
    ?>


</main>

    <footer id="foot2"></footer>
    <?php require_once("footer.html"); ?>
    
    <?php 
        $sql = "SELECT * from objave where lajk = (SELECT MAX(lajk) from objave)";
        $q = mysqli_query($spoj, $sql);
        $red = mysqli_fetch_assoc($q);

        $naslov = $red['naslov'];
    ?>

    <script>
        
         <?php 
            
            $is_admin = ($_SESSION['uloga']==='admin') ? true : false;
        ?>
        
        var is_admin = <?php echo json_encode($is_admin); ?>;

        document.getElementById("nav_objave").classList.add("active");

        if(prijavljen){
            <?php
            $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
        
            ?>
            userID = "<?php echo $user_id ?>";
            console.log("User id: "+ userID);
        }
    </script>


    <script type="text/javascript" src="script.js"></script>
</body>
</html>