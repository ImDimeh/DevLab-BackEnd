
<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1> en savoir plus sur les films</h1>


<div id="container" class=" h-1/10 w-5/6 bg-red-800 flex-row flex justify-around  flex-wrap">

</div>
<form method="post">

<input type="submit" name="AddSee" value="ajouter dans la liste des films vue  ">
</form>


<?php require_once '../connection.php';
echo $_GET['id'];
echo "    A   ";

echo"   session id   ";
echo $_SESSION["id"];
$user_id = $_SESSION["id"];
$connection = new  connection();

 if (isset($_POST['AddSee'])) {
    $connection->addSeeMovie($user_id , $_GET['id']);
 }


?>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

    GetDataId(<?php echo $_GET['id']; ?>)

const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const id = urlParams.get('id')
    
     var user_Id = <?php echo json_encode(user_id); ?>;
                 


document.addEventListener('DOMContentLoaded', event => {
    console.log("test")
   GetDataId(id)
   
    
  
});
    

    function GetDataId(ID) {

           

        const container = document.getElementById("container")
        container.innerHTML = ""
        requette = 'https://api.themoviedb.org/3/movie/' + ID + '?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr'
        console.log(requette)
        axios.get(requette, {}).then(function (response) {
            const data = response.data

            console.log(data);

            // ajout du titre

          
                    const Titre = document.createElement('h3');
                    const titreValue = data.title
                    Titre.innerText = titreValue;
                    Titre.classList.add("text-[#18B794]");
                    container.appendChild(Titre);
                    console.log(Titre)

                    // ajout de la description
                    const p = document.createElement('p');
                    const description = data.overview
                    p.classList.add("text-[#23277B]");
                    p.innerText = description;
                    container.appendChild(p);

                    
                    // ajout du poster

                    const img = document.createElement('img');
                    const affiche = data.backdrop_path

                    img.src = "https://image.tmdb.org/t/p/w500" + affiche

                    img.classList.add("w-36")

                    
                    const budget = document.createElement('h3');
                    const BudgetValue = data.budget
                    budget.innerText = BudgetValue;
                    budget.classList.add("text-[#18B794]");
                    container.appendChild(budget);


                    container.appendChild(img)

                    //console.log( titre)
                }
            )

        }

          
        


</script>



</body>
</html>
