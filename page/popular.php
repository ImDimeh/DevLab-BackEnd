<?php


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../dist/output.css">
    <script src="https://cdn.tailwindcss.com/%22%3E"></script>
    <title>Document</title>
</head>
<body class="bg-[#02015F]">
<h1 class="" id="titre"> FILMS LES PLUS POPULAIRE </h1>
<button onclick="changePopular()"  id="changeButton"> les moins populaire</button>
<div id="container" class=" h-1/10 w-5/6 bg-[#29528A] flex-row flex justify-around  flex-wrap">

</div>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
function changePopular(){
    console.log(requette)
    if (requette=== 'https://api.themoviedb.org/3/movie/popular?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&page=500'){
        requette = 'https://api.themoviedb.org/3/movie/popular?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&page=1'
        const button = document.getElementById("changeButton")
        button.innerText = " afficher les moins populaires"
    }else if (requette === 'https://api.themoviedb.org/3/movie/popular?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&page=1'){
        requette = 'https://api.themoviedb.org/3/movie/popular?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&page=500'
        const button = document.getElementById("changeButton")
        button.innerText = " afficher les plus  populaires"
    }
    console.log(requette)

    const titre = document.getElementById("titre")
    titre.innerText = " Films les moins populaires"

    const container = document.getElementById("container")
    container.innerHTML = ""


    axios.get(requette, {}).then(function (response) {
        const datas = response.data.results
        console.log(datas);
        datas.forEach(data => {
                const item1 = document.createElement('h3');
                const titre = data.title
                item1.innerText = titre;
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

}
    // les plus populaires
    const container = document.getElementById("container")
requette = 'https://api.themoviedb.org/3/movie/popular?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&page=1'
    axios.get(requette, {}).then(function (response) {
        const datas = response.data.results
        console.log(datas);
        datas.forEach(data => {
                const item1 = document.createElement('h3');
                const titre = data.title
                item1.innerText = titre;
            item1.classList.add("text-[#18B794]");
                container.appendChild(item1);

                const p = document.createElement('p');
                const description = data.overview
            p.classList.add("text-[#23277B]");
                p.innerText = description;
                container.appendChild(p);

                const img = document.createElement('img');
                const affiche = data.backdrop_path

                img.src = "https://image.tmdb.org/t/p/w500" + affiche
                console.log("https://image.tmdb.org/t/p/w500" + affiche)
                img.classList.add("w-36")

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

    // les moins populaires
   // axios.get('https://api.themoviedb.org/3/movie/popular?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&page=500', {

</script>
</body>
</html>
