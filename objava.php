<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id='title_objave'></title>
    <link rel="icon" href="os_logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/all.css">
</head>
<body class="bg">
    <main>

    <?php require_once("nav.php"); ?>
    <?php
        include "spoj.php";
     
    ?>

        <?php

            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM `objave` WHERE id = $id";
                $result = mysqli_query($spoj,$sql);

                if(mysqli_num_rows($result)==0){
                    header("Location: /prigovaralica");
                    exit();
                }


                $red = mysqli_fetch_assoc($result);  

                ?>
            <div class='container align-items-center mb-5 mt-5 w-75 bg-dark  blur text-white'>
                <h1 class='text-white text-center text-uppercase'><?php echo $red['naslov']; ?></h1>
                <hr class = "mb-5">
                <h2 class='text-primary mb-4'><?php echo $red['autor']; ?> : </h2>
                <p class="ms-5 fs-6 mb-5"><?php echo $red['opis']?></p>

                <div class="text-center">
                <?php 
                if($red['slika']){
                    ?>
                    <img src="./image/<?php echo $red['slika']; ?>" style="max-height: 100%; max-width: 100%;" class="img-fluid">
                <?php } ?>
                </div>

            <p class="text-end fw-light">Objavljeno: <?php echo date('d.m.Y H:i:s', strtotime($red['vrijeme']));?></p>
            <span id="2like_count_<?php echo $red['id'];?>"><?php echo $red['lajk'];?></span><i id='like_<?php echo $red['id'];?>' class="fa fa-thumbs-up ms-1 lajk-ikona" onclick="likePost(<?php echo $red['id']; ?>, userID)"></i>
                    <span>
                    <span id="2dislike_count_<?php echo $red['id'];?>"  class="ms-4"><?php echo $red['dislajk'];?></span><i id='dislike_<?php echo $red['id'];?>' class="fa fa-thumbs-down ms-1 dislajk-ikona" onclick="dislikePost(<?php echo $red['id']; ?>, userID)"></i>
                    <span class="ms-4"><?php echo $red['komentari'];?><i class="fa-solid fa-comment ms-1 komentar-ikona"></i></span>
                    </span>

            <p class="fs-3 mt-5">Komentari:</p>
            <hr class = "mb-2">
            <div class="container mt-5" id="koment_div">
                <form action="" class="d-flex w-75 mb-5" method="POST">
                    <input class="form-control me-2" type="text" placeholder="Komentiraj" id="komentar_<?php echo $red['id']; ?>" name="komentar_<?php echo $red['id']; ?>">
                    <input type="submit" class="btn btn-success" id="komentiraj_objavu_<?php echo $red['id']; ?>" onclick="anonComment()" name="komentiraj_objavu_<?php echo $red['id']; ?>">
                </form>
                </div>
                <?php 
                    if( isset($_POST['komentiraj_objavu_'. $red['id']]) && !empty($_POST['komentar_'. $red['id']]) && $_SESSION['prijavljen']===true ){
                        $kom_opis = $_POST['komentar_'. $red['id']];
                        
                        $kom_autor = $_SESSION['username'];
    
                        $kom_id_objave = $red['id'];
                        $sql = "INSERT INTO `komentari`(`id_objave`, `autor`, `opis`)
                        VALUES ('$kom_id_objave','$kom_autor','$kom_opis')";
                        $y = mysqli_query($spoj, $sql);
                        $sql = "UPDATE objave SET komentari = komentari + 1 WHERE id = $kom_id_objave";
                        $y = mysqli_query($spoj, $sql);
                    }
                ?>
                    <?php
                        $id_objave = $red['id'];
                        $sql = "SELECT * from komentari WHERE id_objave = $id_objave ORDER BY vrijeme DESC";
                        $x = mysqli_query($spoj,$sql);
                        
                        while($row = mysqli_fetch_assoc($x)){
                            ?>
                            <p class="mt-5 fs-5 text-success"><?php echo $row['autor'];?> :</p>
                            
                            <p class="ms-5 fs-6"><?php echo $row['opis'];?></p>
                            <p class="text-end ms-5 fs-6">Komentirano: <?php echo $row['vrijeme'];?></p>
                            <hr>
                    <?php
                    }
                    ?>
                
            </div>
            
                 
        <?php
            }
            else{
                header("Location: /prigovaralica");
            }
       
        ?>
        
            

    </main>
    <?php require_once("footer.html"); ?>

    <script>
        
           <?php 
            $is_admin = ($_SESSION['uloga']==='admin') ? true : false;
        ?>
        
        is_admin = <?php echo json_encode($is_admin); ?>;

        document.getElementById("nav_objave").classList.add("active");


        <?php 
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM `objave` WHERE id = $id";
            $result = mysqli_query($spoj,$sql);

            $red = mysqli_fetch_assoc($result);  
            $post_title = $red['naslov'];
            echo "let title_objave = '$post_title';";
            

        }
            ?>

        
        

        document.title= title_objave;

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