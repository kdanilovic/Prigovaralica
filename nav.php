<?php
        include "spoj.php";
        session_start();
    ?>


<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/prigovaralica">
            <img src="os_logo.png" alt="Osijek logo" style="width:30px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/prigovaralica">Početna</a>
                </li>
                <li class="nav-item">
                    <a id="nav_objave" class="nav-link" href="objave.php">Objave</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#foot">Kontakt</a>
                </li>
                <li hidden id="admin_nav" class="nav-item">
                            <a id="nav_admin" class="nav-link" href="admin.php">Administratorska prava</a>
                        </li>
            </ul>
            

            <ul class="navbar-nav ms-auto me-5">
                
                <li class="nav-item dropdown" onclick="disabledProfil()">
                    <a class="nav-link dropdown-toggle" id="profil_link" role="button" data-bs-toggle="dropdown">Profil</a>
                    <ul class="dropdown-menu">
                        <li> <a id="nav_postavke" class ="dropdown-item" href="postavke.php">Postavke</a></li>
                        <li> <a id="nav_moje_objave" class ="dropdown-item" href="moje_objave.php">Moje objave</a></li>
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

    </script>
