let tabla_korisnika = document.getElementById("tabla_korisnika");
let tabla_objava = document.getElementById("tabla_objava");

$("#btn_objave").on("click", function(){
    $(this).removeClass("btn-dark");
    $(this).addClass("btn-light");
    $("#btn_profil").removeClass("btn-light");
    $("#btn_profil").addClass("btn-dark");
});

$("#btn_profil").on("click", function(){
    $(this).removeClass("btn-dark");
    $(this).addClass("btn-light");
    $("#btn_objave").removeClass("btn-light");
    $("#btn_objave").addClass("btn-dark");
});


function prikaziObjave(){
    
    tabla_korisnika.setAttribute("hidden", true);
    tabla_objava.removeAttribute("hidden");
}

function prikaziKorisnike(){
    tabla_objava.setAttribute("hidden",true);
    tabla_korisnika.removeAttribute("hidden");
}