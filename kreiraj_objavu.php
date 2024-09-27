<?php
        include "spoj.php";

    ?>




<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static">
    <div class="modal-dialog">
    <div class="modal-content bg-dark text-white w-100">
        <div class="modal-header">
            <h5 class="modal-title">Kreiraj objavu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <p>Autor: <?php echo $_SESSION['username'];?></p>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-floating text-dark fw-bolder">
                    <input type="text" class="form-control fw-bolder mb-5" id="naslov" name="naslov" placeholder="Naslov:">
                    <label for="naslov">Naslov:</label>
                </div>
                <div class="form-floating text-dark">
                    <textarea rows="10" style="height:100%;" class="form-control fst-italic text-dark mb-5" id="opis" name="opis" rows="50" placeholder="Vaš prigovor:"></textarea>
                    <label for="opis">Vaš prigovor:</label>
                    <div class="mb-3">
                        <label for="datoteka" class="form-label text-white mb-2">Dodajte sliku:</label>
                        <input class="form-control mb-5" type="file" id="datoteka" name="slika">
                    </div>
                </div>
                <div class="mb-2">
                <button class="w-100 btn btn-lg btn-secondary mb-2" type="submit" name="create_post">Objavi </button>
                </div>
            </form>
        </div>
    </div>

    </div>

</div>

            <div class="container w-50 mb-3 mt-5">
            <form class="d-flex">
                <input class="form-control me-2 hover-zoom" type="text" placeholder="Kreiraj objavu" id="kreiraj_objavu" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
           
            </form>
            </div>

<?php 
 

if( isset($_POST['create_post']) && !empty($_POST['naslov']) && !empty($_POST['opis']) ) {
    
    $naslov = $_POST['naslov'];
    $opis = $_POST['opis'];
    $autor = $_SESSION['username'];
    $komentari = 0;

    $filename = $_FILES["slika"]["name"];
    $tempname = $_FILES["slika"]["tmp_name"];
    $folder = "./image/" . $filename;



    

    $sql = "INSERT INTO `objave`(`naslov`, `opis`, `slika`, `autor`, `komentari`)
     VALUES ('$naslov','$opis','$filename','$autor', '$komentari')";
    $q = mysqli_query($spoj, $sql);

    if (move_uploaded_file($tempname, $folder)) {
        
    } else {
        echo "Error in uploading file.";
    }

    }

    

?>

<script>
        

    </script>
