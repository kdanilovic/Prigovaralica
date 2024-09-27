<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OS Prigovaralica</title>
        <link rel="icon" href="os_logo.png">
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/all.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </head>
    <body class="bg">
<main>
       
    <?php require_once("nav.php"); ?>

    <?php 
            if($_SESSION['prijavljen']!="true"){
                header("Location: /prigovaralica");
            }
        ?>
<?php 
    $k_ime = $_SESSION['username'];
    $sql = "SELECT * from korisnici where username = '".$k_ime."'";
    $q = mysqli_query($spoj, $sql);
    while($redak = mysqli_fetch_array($q, MYSQLI_ASSOC)){
        $fname = $redak['ime'];
        $lname = $redak['prezime'];
        $email_adress = $redak['email'] ; 

    }

?>

    <div class="mt-5 mb-5 ms-5 text-white d-flex justify-content-center">
    <form id="postavke_forma">

        <div class="row">
            <div class="col">
                <div class="form-floating mb-5">
                <input type="text" class="form-control bg-dark text-white w-75" value="<?php echo $fname ?>" id="ime" name="ime"  placeholder="Ime">
                <label for="ime">Ime:</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating mb-5">
                <input type="text" class="form-control bg-dark text-muted w-75" name="username" id="username" value="<?php echo $_SESSION['username'] ?>" disabled placeholder="Korisničko ime">
                <label for="username">Korisničko ime</label>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col">
                <div class="form-floating mb-5">
                <input type="text" class="form-control bg-dark text-white w-75" value="<?php echo $lname ?>" id="prezime" name="prezime" placeholder="Prezime">
                <label for="prezime">Prezime</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-5">
                <input type="date" class="form-control bg-dark text-muted w-75" value="<?php echo $_SESSION['birthday']?>" disabled id="birthday" name="birthday" placeholder="Datum rođenja">
                <label for="birthday">Datum rođenja</label>
                </div>
            </div>
   
        </div>

        <div class="row">
            <div class="col">
                <div class="form-floating mb-5">
                <input type="text" class="form-control bg-dark text-white w-75" name="email" id="email" value="<?php echo $email_adress?>" placeholder="E-mail adresa">
                <label for="email">E-mail adresa</label>
                </div>
            </div>
            <div class="col">
                <div class="mb-5 text-muted">
                <label for="spol">Spol: <span class="text-white"><?php echo $_SESSION['spol'] ?></label></span>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
           
        
            <button class="btn btn-lg w-50 btn-secondary mb-5" type="button" name="spremi_postavke" onclick="spremiPromjene()">Spremi promjene</button>
            <label id="promjene" class="text-center" hidden>Promjene su spremljene!</label>
        </div>

    </form>
    </div>

    <div class="row me-5">
        <a href="" class="text-white text-end" data-bs-toggle="modal" data-bs-target="#deleteBackdrop">Obriši profil</a>
    </div>

    <div class="modal fade" id="deleteBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteBackdropLabel">Obriši profil</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" onclick="odustani()"></button>
      </div>
      <div class="modal-body">
        <p id="text_modal">Jeste li sigurni da želite obrisati korisnički račun?</p>
      </div>

      <div id="delete_forma" style="display:none">
        <form class="d-flex justify-content-center" >
                
                <div class="form-floating">
                <input type="password" class="form-control bg-dark text-white w-75" name="pw" id="pw" placeholder="Unesite lozinku:">
                <label for="pw">Unesite lozinku:</label>
                </div>

                <div class="form-floating mb-5">
                <input type="password" class="form-control bg-dark text-white w-75" name="pw2" id="pw2" placeholder="Ponovite lozinku:">
                <label for="pw2">Ponovite lozinku:</label>
                </div>
                
    </div>
            <label id = "check_lozinka" hidden class="text-center text-danger fs-3">Lozinke se ne podudaraju!</label>
            <label id = "wrong_pass" hidden class="text-center text-danger fs-3">Kriva lozinka!</label>


      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="odustani()">Ne, odustani</button>
        <button type="button" id="da_obrisi" class="btn btn-danger" onclick="provjeraBrisanjeProfila()">DA, SIGURAN SAM!</button>
        <button type="button" id="obrisi_profil" class="btn btn-danger" style="display:none" onclick="provjeraLozinki()">OBRIŠI PROFIL!</button>    
    </form> 
    </div>
    </div>
  </div>
</div>
  
      
  
</main>
    <?php require_once("footer.html"); ?>
    

    <script>
         <?php 
            $is_admin = ($_SESSION['uloga']==='admin') ? true : false;
        ?>
        
        var is_admin = <?php echo json_encode($is_admin); ?>;
        
        delete_forma = document.getElementById("delete_forma");
        obrisi_profil = document.getElementById("obrisi_profil");
        text_modal = document.getElementById("text_modal");
        let check_pass = document.getElementById("check_lozinka")
        let wrong_pass = document.getElementById("wrong_pass");
        
       

        function provjeraBrisanjeProfila(){
          
            text_modal.style.display="none";

            da_button = document.getElementById("da_obrisi");
            da_button.style.display="none";
            delete_forma.style.display="";
            obrisi_profil.style.display="";
            
        }

        function odustani(){
        
        text_modal.style.display="";
        da_button = document.getElementById("da_obrisi");
        da_button.style.display="";
        delete_forma.style.display="none";
        obrisi_profil.style.display="none";
        check_pass.setAttribute("hidden", true);
        document.getElementById("pw").value= "";
        document.getElementById("pw2").value= "";
        }

        function provjeraLozinki(){
        pw1 = document.getElementById("pw").value;
        pw2 = document.getElementById("pw2").value;

        

            if(pw1!=pw2){
               check_pass.removeAttribute("hidden");
            }
            

            if(pw1==pw2 && pw1!=""){
                check_pass.setAttribute("hidden", true);
                
                $.ajax({
                    type: 'POST',
                    url: 'brisanje_profila.php',
                    data: {password: pw1},
                    success: function(response){
                        console.log(response);
                        if (response.toString().trim() === "1") {
                            window.alert("Profil uspješno obrisan!");
                            location.replace("/prigovaralica");
                        }
                        else{
                            wrong_pass.removeAttribute("hidden");
                        }
                    },

                    error: function(error){
                        console.log('Error:', error);
                    }
    });
      
                

            }


        }

        document.getElementById("nav_postavke").classList.add("active");
        document.getElementById("profil_link").classList.add("active");

    </script>
    <script type="text/javascript" src="script.js"></script>
    </body>
</html>