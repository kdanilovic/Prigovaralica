<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prijava</title>
        <link rel="icon" href="os_logo.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/all.css">
        

    </head>
    <body class="text-center bg">

    <?php
        include "spoj.php";
        session_start();
        $msg="";

        
        if($_SESSION['prijavljen']===true){
            header("Location: /prigovaralica");
        }
 


        if(isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])){

            $sql = "SELECT * from korisnici";
            $q = mysqli_query($spoj, $sql);
        
            while($redak = mysqli_fetch_array($q, MYSQLI_ASSOC)){
                if($_POST['username']==$redak['username'] && $_POST['password'] == $redak['lozinka']){
        
                    $_SESSION ['prijavljen']=true;
                    $_SESSION ['timeout']=time();
                    $_SESSION ['username']=$_POST['username'];
                    $_SESSION ['ime']=$redak['ime'];
                    $_SESSION ['prezime']=$redak['prezime'];
                    $_SESSION ['uloga']=$redak['uloga'];
                    $_SESSION ['email']=$redak['email'];
                    $_SESSION ['spol']=$redak['spol'];
                    $_SESSION ['birthday']=$redak['birthday'];
                    $_SESSION['lozinka']=$redak['lozinka'];
                    $_SESSION['id']=$redak['id'];
                    
                    if($_SESSION['uloga'] == "admin"){
                        header("Location: /prigovaralica");
                    }
                    if($_SESSION['uloga']=="user"){
                    header("Location: /prigovaralica");
                    }
                
                    }else {
                        $invalid = true;
                    }
                }
            }
    ?>
   

            

            <form class="was-validated" action="" method="POST" novalidate> 
                <div class="container card p-5 bg-dark text-white text-center shadow-2-strong position-absolute top-50 start-50 translate-middle">
                    <a href="index.php"><button type="button" class="btn-close btn-close-white float-end"></button></a>    
                    <h1 class="h1 mb-5">Prijava</h1>
                    <div class="form-floating mb-5">
                        <input type="text" class="form-control bg-dark text-white" id="username" name="username" placeholder="Korisničko ime" required>
                        <label for="username">Korisničko ime:</label>
                    </div>
                    <div class="form-floating mb-5">
                        <input type="password" id="password" name="password" class="form-control bg-dark text-white"  placeholder="Lozinka" required>
                        <label for="password">Lozinka:</label>
                        <div id ="invalid_username_pass" hidden class="invalid-feedback">Neispravno korisničko ime ili lozinka!</div>
                    </div>
                    <a href="registracija.php"><p class="fs-6 fw-light text-start text-white">Nemate korisnički račun? Registrirajte se!</p></a>
                    <button class="w-100 btn btn-lg btn-secondary mb-5" type="submit" name="login" >Prijavi se</button>
                </div>
            </form>
        

            <script>
                <?php if(isset($invalid) && $invalid == true): ?>
                    let invalid = true;
                    let invalid_username_pass = document.getElementById("invalid_username_pass");
                    invalid_username_pass.removeAttribute("hidden");
                <?php endif; ?>

                <?php 
            
                    $is_admin = ($_SESSION['uloga']==='admin') ? true : false;
                ?>
                
                var is_admin = <?php echo json_encode($is_admin); ?>;
                let prijavljen=false;
                prijavljen = <?php echo $_SESSION['prijavljen'] ? 'true' : 'false'; ?>;
            </script>
 
    <script type="text/javascript" src="script.js"></script>
    </body>
</html>