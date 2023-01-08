<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>films</title>
    <link rel="stylesheet" href="../style-tailwind/style-tailwind.css">
</head>
<body>
<header class="flex bg-gray-dark-2 p-5 items-center justify-center gap-5 text-[white]">
    <input type="text" class="rounded-[20px] text-black text-center"
           onchange="searchFilms(this);" style="outline: none;border: none;" placeholder="Recherche par titre">
    <nav class="flex gap-[20px] text-[white] font-bold font-monserrat">
        <a class="p-1 px-5 hover:text-green-one" href="./accueil.php">ACCUEIL</a>
        <a class="p-1 px-5 hover:text-green-one" href="./films.php">FILMS</a>
        <a class="p-1 px-5 hover:text-green-one" href="./compte.php">MON COMPTE</a>
        <a class="p-1 px-5 hover:text-green-one" href="./users.php">USERS</a>
    </nav>
</header>
<main id="app" class="bg-gradient-to-b from-blue-one to-blue-two h-max opacity-20 flex-col p-60">
    <div class="" style="display: flex;justify-content: center;">
         <film v-for="film in films"
                  :title="film.original_title"
                  :path_backdrop="film.backdrop_path"
                  :src="'https://image.tmdb.org/t/p/w300/' + film.backdrop_path"
                  :poster_path="film.poster_path"
                  :srcposter="'https://image.tmdb.org/t/p/w342/' + film.poster_path"
                  :popularity="film.popularity"
                  :date="film.release_date"
                  :overview="film.overview"
                  :id="film.id"
                  onclick="consultationFilm(this)"
                  style="width:50%;background-color:transparent;color:white;"></film>
    </div>
</main>


<!-- Importer axios -->
<script src="https://cdn.jsdelivr.net/npm/axios@0.12.0/dist/axios.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/vue@2"></script> -->
<script src="https://unpkg.com/vue@2"></script>
<script>

    var appF = new Vue({
        el: '#app',
        data: {
            films:[]
        }
    })


    Vue.component('film', {
        props: ['title', 'path_backdrop', 'src', 'popularity', 'date', 'poster_path', 'srcposter',
            'overview'],
        template:`
              <div>
                <img v-if="path_backdrop!=null" :src="src" width="100%">
                <img v-else-if="poster_path!=null" :src="srcposter" width="100%" >
                <div style="margin-top: 50px;">
                    <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-xl">TITRE</p>
                    <p style="padding-left:5px;text-align: center;margin-top: 20px;">{{ title }}</p>
                    <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-xl">RESUME</p>
                    <p style="padding-left:5px;margin-top: 20px;">{{ overview }}</p>
                    <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-xl">VIDEO</p>
                    <p style="padding-left:5px;margin-top: 20px;"></p>
                </div>
	          </div>
            `
    })


    function api_loadFilms(page, caterogie){
        axios.get('https://api.themoviedb.org/3/movie/<?= $_GET['filmId'] ?>?api_key=698099b300e1dd87a14b503850a01e56&language=en-US')
            .then(function (response) {
                appF.films = [response.data]
            })
            .catch(function (error) {
                mess  = "Erreur ! Impossible d'accéder à l'API." + error
            })
    }

    api_loadFilms(1, -1);

</script>
</body>
</html>
