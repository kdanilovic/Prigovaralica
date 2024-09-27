<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/all.css">
</head>
<body>
    <?php

    include "spoj.php";
    
    if( isset($_POST['create_post']) && !empty($_POST['naslov']) && !empty($_POST['opis']) ) {
    
    $naslov = $_POST['naslov'];
    $opis = $_POST['opis'];
    $slika = $_POST['datoteka'];
    $autor = $_SESSION['username'];
    $komentari = 0;
    

    $sql = "INSERT INTO `objave`(`naslov`, `opis`, `slika`, `autor`, `komentari`)
     VALUES ('$naslov','$opis','$slika','$autor', '$komentari')";
    $q = mysqli_query($spoj, $sql);


    }



    ?>



<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Kreiraj objavu
</button>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static">
    <div class="modal-dialog">
    <div class="modal-content bg-dark text-white w-100">
        <div class="modal-header">
            <h5 class="modal-title">Kreiraj objavu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <p>Autor: <?php echo $_SESSION['username'];?></p>
            <form action="" method="POST">
                <div class="form-floating text-dark fw-bolder">
                    <input type="text" class="form-control fw-bolder mb-5" id="naslov" name="naslov" placeholder="Naslov:">
                    <label for="naslov">Naslov:</label>
                </div>
                <div class="form-floating text-dark">
                    <textarea rows="10" style="height:100%;" class="form-control fst-italic text-dark mb-5" id="opis" name="opis" rows="50" placeholder="Vaš prigovor:"></textarea>
                    <label for="opis">Vaš prigovor:</label>
                    <div class="mb-3">
                        <label for="datoteka" class="form-label text-white mb-2">Dodajte sliku:</label>
                        <input class="form-control mb-5" type="file" id="datoteka" name="datoteka">
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


</body>
</html>