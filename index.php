<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OS Prigovaralica</title>
        <link rel="icon" href="os_logo.png">
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/all.css">
    </head>
    <body class="bg">

    <?php
        include "spoj.php";
        session_start();
        if(!isset($_SESSION['prijavljen'])){
            $_SESSION['prijavljen']=false;
        }

        if(!isset($_SESSION['uloga'])){
            $_SESSION['uloga']="korisnik";
        }
        
       
    ?>

 
       
            <h1 class="display-3 text-center">
                <a href="#">
                    <small class="text-white">OSJEČKA</small>
                    PRIGOVARALICA
                </a>
            </h1>
 


        <nav class="navbar navbar-expand-sm navbar-dark sticky-top blur">
            <div class="container-fluid me-5">
                <a class="navbar-brand" href="/prigovaralica">
                    <img src="os_logo.png" alt="Osijek logo" style="width:30px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a  id="nav_pocetna" class="nav-link" href="/prigovaralica">Početna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="objave.php">Objave</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#foot">Kontakt</a>
                        </li>
                        <li hidden id="admin_nav" class="nav-item">
                            <a class="nav-link" href="admin.php">Administratorska prava</a>
                        </li>
                    </ul>

            
                    <ul class="navbar-nav ms-auto me-5">
                        <li class="nav-item dropdown" onclick="disabledProfil()"  >
                            <a class="nav-link dropdown-toggle" id="profil_link" role="button" data-bs-toggle="dropdown">Profil</a>
                            <ul class="dropdown-menu">
                                <li> <a class ="dropdown-item" href="postavke.php">Postavke</a></li>
                                <li> <a class ="dropdown-item" href="moje_objave.php">Moje objave</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li> <a class ="dropdown-item" href="odjava.php">Odjava</a></li>
                            </ul>
                            <li class="nav-item fs-6 text-white mt-2"> <?php hello_user(); ?></li>
                        <li class="nav-item" id="prijava_link">
                            <a class="nav-link" href="prijava.php">Prijava</a>
                        </li>
                        <li class="nav-item dropdown" id="registracija_link">
                            <a class="nav-link" href="registracija.php">Registracija</a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </nav>
<main>
        <?php 
        include "kreiraj_objavu.php";
        ?>

    <div class="row mt-5 mb-3 me-2">
        <div class="col ms-5 me-5 mb-2 mt-5 bg-danger rounded text-white hover-zoom">
        <a class="text-white" id="link_dislike">  
                <p class="text-center">Najkontroverznija objava</p>
                <hr class="hr">
                <p id="disliked_post"></p>
    </a>
        </div>

        <div class="col text-white ms-5 me-5 mb-2 mt-5 bg-success rounded hover-zoom">
            <a class="text-white" id="link_pop">  
        <p class="text-center">Najpopularnija objava</p>
            <hr class="hr">
            <p id="pop_objava"></p>
            </a>  
        </div>
        <div class="col text-white ms-5 me-5 mb-2 mt-5 bg-primary rounded hover-zoom">
        <a href="https://www.facebook.com/groups/1281110656624773" target=”_blank” class="text-white">    
        <p class="text-center">Facebook objave</p>
            <hr class="hr">
            <p id="facebook-objava"></p>
        </div>
        </a>
    </div>
    
    <div class="container d-flex flex-column align-items-center hover-zoom" >
            <i id="refresh_ikona" class="fa fa-refresh text-white align-items-center" style="cursor: pointer;" aria-hidden="true" onclick="refreshObjave()"></i>
            <p class="text-white" style="cursor: pointer;" onclick="refreshObjave()">Osvježi</p>
    </div>

    </main>

    <footer id="foot" class="text-white bg-dark mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm text-center my-3">
                    <h2 class="display-7">Osječka<br>Prigovaralica</h2>
                </div>
                <div class="col-sm text-center">
                    <div class="row my-3">
                        <a class="text-white" href="https://web.facebook.com/Dankii02/" target="_blank">
                            <img src="facebook_icon.png" style="width:20px" alt="Facebook icon"> Facebook
                        </a>
                    </div>
                    <div class="row my-3">
                        <a class="text-white" href="https://www.instagram.com/kristijan_danilovic02/" target="_blank">
                            <img src="instagram_icon.png" style="width:20px" alt="Instagram icon"> Instagram
                        </a>
                    </div>
                </div>
                <div class="col-sm my-3">
                    <div class="row my-3"></div>
                    <div class="row d-flex align-items-center justify-content-center text-center">E-mail: kdanilovic@etfos.hr</div>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center">2023. Copyright:
            <a href="">@ Osječka prigovaralica</a>
        </div>
    </footer>


    <?php
    function hello_user(){

        if($_SESSION['prijavljen']==true){
            if($_SESSION['spol']=='M'){
            echo "Dobrodošao " . $_SESSION['username'] . " !";
            }
            if($_SESSION['spol']=='Z'){
                echo "Dobrodošla " . $_SESSION['username'] . " !";
                }              
        }

    }
        

    ?>

    <script>
        let prijavljen=false;
        prijavljen = <?php echo $_SESSION['prijavljen'] ? 'true' : 'false'; ?>;
        let is_admin = false;

       
            <?php 
            $is_admin = ($_SESSION['uloga']==='admin') ? true : false;
        ?>
        
        is_admin = <?php echo json_encode($is_admin); ?>;
        
        document.getElementById("nav_pocetna").classList.add("active");

        if(prijavljen){
            <?php
            $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
        
            ?>
            userID = "<?php echo $user_id ?>";
            console.log("User id: "+ userID);
        }
        
      
    </script>
    

  <script type="text/javascript" src="script.js"></script>
  <script type="text/javascript" src="script2.js"></script>
    </body>
</html>