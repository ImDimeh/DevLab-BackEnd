<?php 
session_start();

require_once "../page/components/header.php";
?>

<h1> film que vous avez vue</h1>
<?php
require_once '../connection.php';

?>

<div class="seeMovieContaienr" id="seeMovieContaienr">
  film vue par l'utilsateur 
</div>
<?php

$connection = new  connection();
$result = $connection->getAllUserSeeMovie();
$r = $connection->getAllUserSeeMovieById(35);






?>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

    var seeMovieArray = <?php echo json_encode($r); ?>;

   document.addEventListener('DOMContentLoaded', event => {
    log();
   
    
  
});
function log (){

  seeMovieArray.forEach(data => {
   
   GetDataId(data.moovie_id)
    
  })
 }
    function GetDataId(ID) {

           

        const seeMovieContaienr = document.getElementById("seeMovieContaienr")
        seeMovieContaienr.innerHTML = ""
        requette = 'https://api.themoviedb.org/3/movie/' + ID + '?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr'
        
        axios.get(requette, {}).then(function (response) {
            const data = response.data

            console.log(data);

            // ajout du titre

          
                    const Titre = document.createElement('h3');
                    const titreValue = data.title
                    Titre.innerText = titreValue;
                    Titre.classList.add("text-[#18B794]");
                    seeMovieContaienr.appendChild(Titre);
                    console.log(Titre)

                    
                    
                    // ajout du poster

                    const img = document.createElement('img');
                    const affiche = data.backdrop_path

                    img.src = "https://image.tmdb.org/t/p/w500" + affiche

                    img.classList.add("w-36")

                    
                    


                    seeMovieContaienr.appendChild(img)

                    //console.log( titre)
                }
            )
        }
          
  </script>