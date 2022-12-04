<?php



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./dist/output.css">
    <title>Document</title>
</head>
<body>
<h1> FILMS LES PLUS POPULAIRE  </h1>

<div id="container" class="flex flex-col w-9/12  h-96 bg-amber-700">
   
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script >

    const container = document.getElementById("container")
  
    axios.get('https://api.themoviedb.org/3/movie/popular?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&page=1', {

    }).then(function (response) {
        const datas = response.data.results
        console.log(datas);

        datas.forEach(data =>{
               console.log(data)


                const item1 = document.createElement('h3');
                const titre = data.title
                 console.log(titre)
                item1.innerText = titre;
                console.log(item1)
                container.appendChild(item1);

                const p = document.createElement('p');
                const description = data.overview
                p.innerText = description;

                container.appendChild(p);

                const img = document.createElement('img');
                const affiche = data.backdrop_path
               img.src = "https://image.tmdb.org/t/p/w500" + affiche
                  console.log("https://image.tmdb.org/t/p/w500" + affiche)
           container.appendChild(img)

        }


        )



    })
        .catch(function (error) {
            console.log(error);
        })
        .then(function () {
            console.log("fin de la requette ")
        });


</script>
</body>
</html>
