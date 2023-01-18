<?php 
session_start();

require_once "../page/components/header.php";
?>

<h1> films  à regarder</h1>
<?php
require_once '../connection.php';

?>

<div class="wishlistContaienr" id="wishlistContaienr">
  Liste des films à voir
</div>
<?php

$connection = new  connection();
$result = $connection->getAllUserWishList();
$r = $connection->getAllUserWishListById($_SESSION["id"]);






?>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

    var wishListMoovieArray = <?php echo json_encode($r); ?>;

   document.addEventListener('DOMContentLoaded', event => {
    log();
   
    
  
});
function log (){

  wishListMoovieArray.forEach(data => {
   
   GetDataId(data.moovie_id)
    
  })
 }
    function GetDataId(ID) {

           

        const wishlistContaienr = document.getElementById("wishlistContaienr")
        wishlistContaienr.innerHTML = ""
        requette = 'https://api.themoviedb.org/3/movie/' + ID + '?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr'
        
        axios.get(requette, {}).then(function (response) {
            const data = response.data

            console.log(data);

            // ajout du titre

          
                    const Titre = document.createElement('h3');
                    const titreValue = data.title
                    Titre.innerText = titreValue;
                    Titre.classList.add("text-[#18B794]");
                    wishlistContaienr.appendChild(Titre);
                    console.log(Titre)

                    
                    
                    // ajout du poster

                    const img = document.createElement('img');
                    const affiche = data.backdrop_path

                    img.src = "https://image.tmdb.org/t/p/w500" + affiche

                    img.classList.add("w-36")

                    
                    


                    wishlistContaienr.appendChild(img)

                    
                }
            )
        }
          
  </script>