


    
    console.log("Administrator: " + is_admin);
    console.log("prijavljen: " + prijavljen);



if(prijavljen && is_admin){
    admin_navigacija = document.getElementById("admin_nav");
    admin_navigacija.removeAttribute("hidden");
}


 
var prijava = document.getElementById('prijava_link');
var registracija = document.getElementById('registracija_link');

if(prijavljen==true){
    prijava.style.display="none";
    registracija.style.display="none";
}
else {
    prijava.style.display="";
    registracija.style.display="";
}




let profil_link = document.getElementById('profil_link');

document.addEventListener('DOMContentLoaded', function() {
if (prijavljen==false){
    profil_link.classList.add('disabled');
}
else{
    profil_link.classList.remove('disabled');
}
});

function disabledProfil(){
    if(prijavljen==false){
    alert("Morate se prvo prijaviti!");
    }
}

document.addEventListener('DOMContentLoaded', function() {
    if (prijavljen==false){
        document.getElementById("kreiraj_objavu").disabled = true;
    }
    else{
        document.getElementById("kreiraj_objavu").disabled = false;
    }
});


function likePost(postId, userId){
    if(prijavljen===false){
        alert("Da bi lajkali objavu morate biti prijavljeni!");
    }

    else{
        let reaction = "like";
        console.log("reaction: "+ reaction);
        console.log("post id:" + postId);
        console.log("User ID koji lajka: "+ userId);
        $.ajax({
            url: 'like_dislike.php', 
            type: 'POST',
            data: { postId: postId, userId: userId, reaction: reaction, },
             
            success: function(response) {
                $('#like_count_' + postId).text(response.likes);
                $('#2like_count_' + postId).text(response.likes);
                $('#dislike_count_' + postId).text(response.dislikes);
                $('#2dislike_count_' + postId).text(response.dislikes);
                console.log('AJAX Response:', response);

            },
            error: function(error) {
                console.error('Error liking post:', error);
            }
        });
}
}

function dislikePost(postId,userId){
    if(prijavljen===false){
        alert("Da bi dislajkali objavu morate biti prijavljeni!");
    }
    else{
        let reaction = "dislike";
        console.log("reaction: "+ reaction);
        console.log("post id:" + postId);
        console.log("post id:" + postId);
        console.log("User ID koji dislajka: "+ userId);
        $.ajax({
            url: 'like_dislike.php', 
            type: 'POST',
            data: { postId: postId, userId: userId, reaction: reaction, },
             
            success: function(response) {
                $('#dislike_count_' + postId).text(response.dislikes);
                $('#2dislike_count_' + postId).text(response.dislikes);
                $('#like_count_' + postId).text(response.likes);
                $('#2like_count_' + postId).text(response.likes);
                console.log('AJAX Response:', response);
                

            },
            error: function(error) {
                console.error('Error disliking post:', error);
            }
        });
}
}

 
function anonComment(){

    if(prijavljen===false){
    alert("Da biste mogli komentirati morate biti logirani!");
    }
}



function spremiPromjene(){
    var label = document.getElementById("promjene");
    label.removeAttribute("hidden");

    let formData = $("#postavke_forma").serialize();

    console.log(formData);

    $.ajax({
        type: 'POST',
        url: 'update_profile.php',
        data: formData,
        success: function(response){
            console.log(response);
        },

        error: function(error){
            console.log('Error:', error);
        }
    });
}



