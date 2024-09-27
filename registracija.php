<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registracija</title>
        <link rel="icon" href="os_logo.png">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/all.css">
        

    </head>

    <?php 
     include "spoj.php";
     session_start();

    ?>

    <?php 
            if($_SESSION['prijavljen']===true){
                header("Location: /prigovaralica");
            }
        ?>

    <body class="bg ">

    
<main>

    <form id="register_forma"  novalidate>
        <div class="container rounded text-white bg-dark shadow-2-strong  mt-5 mb-5">
            <a href="index.php"><button type="button" class="btn-close btn-close-white float-end"></button></a>
            <h1 class="h1 text-center">Registracija</h1>
            <label for="ime">Ime:</label>
            <input class="form-control form-control-sm bg-dark text-white w-50 mb-3" type="text" name="ime" id="ime" required>
            <div id ="invalid_ime" hidden class="text-danger">Unesite ispravno ime!</div>
            <label for="prezime">Prezime:</label>
            <input class="form-control form-control-sm bg-dark text-white w-50 mb-3" type="text" name="prezime" id="prezime" required>
            <div id ="invalid_prezime" hidden class="text-danger">Unesite ispravno prezime!</div>
            <label for="username">Korisničko ime:</label>
            <input class="form-control form-control-sm bg-dark text-white w-50 mb-3" type="text" name="username" id="username" required>
            <div id ="invalid_username" hidden class="text-danger">Unesite ispravno korisničko ime!</div>
            <div id ="invalid_username2" hidden class="text-danger">Korisničko ime već postoji! Probajte drugo</div>
            <div id="usernameHelp" class="form-text mb-2">
                Korisničko ime mora imati najmanje 4 znaka!
                </div>
            <label for="email">E-mail:</label>
            <input class="form-control form-control-sm bg-dark text-white w-50 mb-3" type="email" name="email" id="email" required>
            <div id ="invalid_email" hidden class="text-danger">Unesite ispravnu E-mail adresu!</div>
            <div id ="invalid_email2" hidden class="text-danger">E-mail adresa već postoji, upotrijebite drugu!</div>
            <label for="password">Lozinka:</label><i class="fa-solid fa-eye fa-beat-fade ms-2" style="color: #ababab;" onclick="showPass()"></i>
            <input class="form-control form-control-sm bg-dark text-white w-50 mb-1" type="password" name="password" id="password" required>
                <div id="passwordHelpBlock" class="form-text mb-2">
                Lozinka mora imati najmanje 8 znakova, uključujući barem jedan broj!
                </div>
            <label for="password2">Ponovi Lozinku:</label>
            <input class="form-control form-control-sm bg-dark text-white w-50 mb-3" type="password" name="password2" id="password2" required>
            <div id ="invalid_pass1" hidden class="text-danger">Unesite ispravnu lozinku!</div>
            <div id ="invalid_pass2" hidden  class="text-danger">Lozinke se moraju podudarati!</div>
            <label>Spol:</label>
            <input class="form-check-input" type="radio" name="spol" id="m" value="M" required>
            <label class="form-check-label" for="m">M</label>
            <input type="radio" name="spol" id="z" value="Z">
            <label class="form-check-label mb-2" for="z">Ž</label>
            <div id ="invalid_spol" hidden class="text-danger">Odaberite spol!</div>
            <br>
            <label for="birthday">Datum rođenja:</label>
            <input class="form-control form-control-sm bg-dark text-white w-50 mb-3" type="date" name="birthday" id="birthday" required>
            <div id ="invalid_datum" hidden class="text-danger">Unesite ispravan datum rođenja!</div>
            <div id ="invalid_datum2" hidden class="text-danger">Morate biti stariji od 18 godina!</div>
            <a href="prijava.php"><p class="fs-6 fw-light text-start text-white w-50">Već imate korisnički profil? Prijavite se!</p></a>
            <button class="w-50 btn btn-lg btn-secondary mb-5" type="button" name='register' onclick="provjera_registracija()">Registriraj se</button>
            
    </div>
        </div>
    </form>
    </main>
   
    
   
    <script>
        let prijavljen=false;
        prijavljen = <?php echo $_SESSION['prijavljen'] ? 'true' : 'false'; ?>;

        function sadrziBrojeve(str) {
            return /\d/.test(str);
        }

        function prvoSlovoVeliko(str) {
            const prvo_slovo = str.charAt(0);


            return prvo_slovo === prvo_slovo.toUpperCase();
        }

    function provjera_registracija(event){
        

        var ime = document.getElementById("ime").value;
        var prezime = document.getElementById("prezime").value;
        var username= document.getElementById("username").value;
        var email= document.getElementById("email").value;
        var password= document.getElementById("password").value;
        var M = document.getElementById("m");
        var Z = document.getElementById("z");
        var datum_rodjenja = document.getElementById("birthday").value;

        let invalid_ime = document.getElementById("invalid_ime");
        let invalid_prezime = document.getElementById("invalid_prezime");
        let invalid_username = document.getElementById("invalid_username");
        let invalid_email = document.getElementById("invalid_email");
        let invalid_password1 = document.getElementById("invalid_pass1");
        let invalid_password2 = document.getElementById("invalid_pass2");
        let invalid_spol = document.getElementById("invalid_spol");
        let invalid_datum = document.getElementById("invalid_datum");
        let invalid_datum2 = document.getElementById("invalid_datum2");

        if(sadrziBrojeve(ime) || ime=="" || !prvoSlovoVeliko(ime) || ime.length>30 || ime.length<=2){
            invalid_ime.removeAttribute("hidden");
           

        }else{
            invalid_ime.setAttribute("hidden",true);
        }

        if(sadrziBrojeve(prezime) || prezime=="" || !prvoSlovoVeliko(prezime) || prezime.length>30 || prezime.length<=2){
            invalid_prezime.removeAttribute("hidden");
        }else{
            invalid_prezime.setAttribute("hidden",true);
        }
       
       
        if(username.length<4 || username.length>30){
            invalid_username.removeAttribute("hidden");
        }else{
            invalid_username.setAttribute("hidden",true);
        }


        if(email=="" || email.length>50){
            invalid_email.removeAttribute("hidden");
        }else{
            invalid_email.setAttribute("hidden",true);
        }    
        
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailRegex.test(email)===false) {
                    invalid_email.removeAttribute("hidden");
            }
            else{
                    invalid_email.setAttribute("hidden",true);
            }
 
        if(password=="" || password.length<8 || !/\d/.test(password)){
            invalid_password1.removeAttribute("hidden");
        }
        else{
            invalid_password1.setAttribute("hidden",true);
            }
        

        lozinka1 = document.getElementById('password').value;
        lozinka2 = document.getElementById('password2').value;
        if(lozinka2!=lozinka1){
            invalid_password2.removeAttribute("hidden");
        }
        else{
            invalid_password2.setAttribute("hidden",true);
            }
        

        if(!M.checked && !Z.checked){
            invalid_spol.removeAttribute("hidden");
        }
        else{
            invalid_spol.setAttribute("hidden",true);
            }
        
            
        let date = new Date(datum_rodjenja);
        let godina = new Date().getFullYear() - date.getFullYear();

        if (godina < 18) {
            invalid_datum2.removeAttribute("hidden");
        } else {
            invalid_datum2.setAttribute("hidden",true);
        }

        if (datum_rodjenja=="") {
            invalid_datum.removeAttribute("hidden");
        } else {
            invalid_datum.setAttribute("hidden",true);
        }

    if(invalid_ime.hasAttribute("hidden") && invalid_prezime.hasAttribute("hidden") 
    && invalid_username.hasAttribute("hidden") && invalid_email.hasAttribute("hidden") &&
    invalid_password1.hasAttribute("hidden") && invalid_password2.hasAttribute("hidden") &&
    invalid_spol.hasAttribute("hidden") && invalid_datum.hasAttribute("hidden")
     && invalid_datum2.hasAttribute("hidden") ){
     
     
    let formData = $("#register_forma").serialize();
    console.log(formData);

    $.ajax({
        type: 'POST',
        url: 'register_proces.php',
        data: formData,
        success: function(response){
            console.log(response);
            response = JSON.parse(response);
            if (response.username_zauzet) {
                
                let username_zauzet = document.getElementById("invalid_username2");
                username_zauzet.removeAttribute("hidden");
            }

            if (response.email_zauzet) {
                    let email_zauzet = document.getElementById("invalid_email2");
                    email_zauzet.removeAttribute("hidden");
                }

                if (response.success) {
                    window.location.href = 'prijava.php';
                }
        },

        error: function(error){
            console.log('Error:', error);
        }
    });
}

    }

    

    function showPass(){
    var lozinka = document.getElementById("password");

      if (lozinka.type === "password") {
        lozinka.type = "text";
      } else {
        lozinka.type = "password";
      }
    }
              


    </script>
   
    </body>
</html>