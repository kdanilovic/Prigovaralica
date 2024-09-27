$.ajax({
    url: 'pop_post.php', 
    type: 'GET',
    dataType:  'json',
    

    success: function(response) {
        if (response.error) {
            console.error('Error: ', response.error);
        } else {
            let opis = response.opis.substring(0, 170)+".....";
            let id = response.id;
            console.log("Id najpop objave je", id);
            let link_do_objave = document.getElementById("link_pop");
            link_do_objave.href="objava.php?id="+id;
            document.getElementById("pop_objava").innerHTML = opis;
            $('#pop_objava').html(opis);
            console.log('AJAX Response:', opis);
        }
    },
    error: function(xhr, status, error) {
        console.error('AJAX Error: ', status, error);
    }
});

$.ajax({
    url: 'disliked_post.php', 
    type: 'GET',
    dataType:  'json',
    

    success: function(response) {
        
        if (response.error) {
            console.error('Error: ', response.error);
        } else {
            let opis = response.opis.substring(0, 170)+".....";
            let id = response.id;
            console.log("Id najkontroverznije objave je", id);
            let link_do_objave = document.getElementById("link_dislike");
            link_do_objave.href="objava.php?id="+id;
            document.getElementById("disliked_post").innerHTML = opis;
            console.log('AJAX Response:', opis);
        }
    },
    error: function(xhr, status, error) {
        console.error('AJAX Error: ', status, error);
    }
});


const accessToken = 'EAAFU1aVPaLcBO9g0C26r7ae31RpNhv9PTd08Yc174PgNufkfQeUSjZC6CLdc67oT2zLP4UZCOhsJ1vFrZBTG9rebMK1LoyiyDDOef0NNt0SN3SZBzyYhTZBQfneQwtXOJxV2mAAoZByhrOa4o5zQmG6K3gbrswkxQzrJomaCEpBQIOBToKi3I2konNcTLtEblQ739lGPflAAUTczjas5gBFaNh8ZCsHlZAEceuwwQKaMozrT0OLZAxWYOJAZCJ07bPEQsZD';
const groupId = '1281110656624773';
const apiUrl = `https://graph.facebook.com/v18.0/${groupId}/feed?access_token=${accessToken}`;

$.ajax({
    url: apiUrl,
    method: 'GET',
    dataType: 'json',
    success: function (response) {
     

        const posts = response.data;
        const postContainer = $('#facebook-objava');
        console.log("facebok objave:", posts);
        let poruka = posts[0].message;
        poruka = poruka.substring(0, 170)+".....";
        document.getElementById("facebook-objava").innerHTML = poruka; 
        
       
    },
    error: function (error) {
        console.error('Error fetching Facebook data:', error);
    }   
});



function refreshObjave(){
    let refresh_ikona = document.getElementById("refresh_ikona");
    
    refresh_ikona.addEventListener("click", function() {
  
    refresh_ikona.classList.add("fa-pulse");


    setTimeout(function() {
        refresh_ikona.classList.remove("fa-pulse");
    }, 1000); 
});
    
$.ajax({
    url: 'pop_post.php', 
    type: 'GET',
    dataType:  'json',
    

    success: function(response) {
        if (response.error) {
            console.error('Error: ', response.error);
        } else {
            let opis = response.opis.substring(0, 170)+".....";
            let id = response.id;
            console.log("Id najpop objave je", id);
            let link_do_objave = document.getElementById("link_pop");
            link_do_objave.href="objava.php?id="+id;
            document.getElementById("pop_objava").innerHTML = opis;
            $('#pop_objava').html(opis);
            console.log('AJAX Response:', opis);
        }
    },
    error: function(xhr, status, error) {
        console.error('AJAX Error: ', status, error);
    }
});

$.ajax({
    url: 'disliked_post.php', 
    type: 'GET',
    dataType:  'json',
    

    success: function(response) {
        if (response.error) {
            console.error('Error: ', response.error);
        } else {
            let opis = response.opis.substring(0, 170)+".....";
            let id = response.id;
            console.log("Id najkontroverznije objave je", id);
            let link_do_objave = document.getElementById("link_dislike");
            link_do_objave.href="objava.php?id="+id;
            document.getElementById("disliked_post").innerHTML = opis;
            console.log('AJAX Response:', opis);
        }
    },
    error: function(xhr, status, error) {
        console.error('AJAX Error: ', status, error);
    }
});

$.ajax({
    url: apiUrl,
    method: 'GET',
    dataType: 'json',
    success: function (response) {
     

        const posts = response.data;
        const postContainer = $('#facebook-objava');
        console.log("facebok objave:", posts);
        let poruka = posts[0].message;
        poruka = poruka.substring(0, 170)+".....";
        document.getElementById("facebook-objava").innerHTML = poruka; 
        
       
    },
    error: function (error) {
        console.error('Error fetching Facebook data:', error);
    }   
});


}