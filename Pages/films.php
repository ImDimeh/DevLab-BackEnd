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
        <p class="font-monserrat font-bold text-[white] text-4xl text-center">FILMS</p>
       <!-- <div class="">
            <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-4xl"> Films du moment</p>

        </div> -->

        <p class="font-monserrat font-bold text-[white] border-solid border-b mt-9 text-4xl "> Recherche de films </p>
        <div class="" style="display: flex;gap:40px;margin-top: 10px;">
            <div><categorie :options="categories"/></div>
            <input type="text"
               style="padding:5px;outline:none;border:none; background-color:transparent; color:white; border-bottom: 2px solid MediumSeaGreen;text-align:center;"
               placeholder="Recherche par nom/titre"
               onchange="searchFilms(this);">

            <select style="padding:5px;outline:none;border:none; background-color:transparent; color:white; border-bottom: 2px solid MediumSeaGreen;text-align:center;"
                    onchange="applyTri(this)">
                <option value="-1" selected style="color:black;">Tri recherche</option>
                <optgroup label="Tri par popularité" style="color:black;text-align: left;">
                    <option value="popularity.asc">popularité croissante</option>
                    <option value="popularity.desc">popularité décroissante</option>
                </optgroup>
                <optgroup label="Tri par revenu" style="color:black;text-align: left;">
                    <option value="revenue.asc">Revenu croissant</option>
                    <option value="revenue.desc">Revenu décroissant</option>
                </optgroup>
                <optgroup label="Tri par date de sortie" style="color:black;text-align: left;">
                    <option value="primary_release_date.desc">Date de sortie décroissante</option>
                    <option value="primary_release_date.asc">Date de sortie croissante</option>
                </optgroup>
                <optgroup label="Tri par nom" style="color:black;text-align: left;">
                    <option value="original_title.desc">Nom/Titre décroissant</option>
                    <option value="original_title.asc">Nom/Titre croissant</option>
                </optgroup>
                <optgroup label="Tri par note" style="color:black;text-align: left;">
                    <option value="vote_average.desc">Note décroissante</option>
                    <option value="vote_average.asc">Note croissante</option>
                </optgroup>
                <optgroup label="Tri par nombre de votant" style="color:black;text-align: left;">
                    <option value="vote_count.desc">vote_count.desc</option>
                    <option value="vote_count.asc">vote_count.asc</option>
                </optgroup>
                <optgroup label="Tri par date de sortie" style="color:black;text-align:left;">
                    <option value="release_date.asc">Date de sortie croissante</option>
                    <option value="release_date.desc">Date de sortie décroissante</option>
                </optgroup>
            </select>
            <div><certification :options="certifications"/></div>
            <div style="display:flex;gap:10px;justify-content:right;padding-right:20px;width: 100%;">
                <a href="javascript:void();" onclick="prev();" style="text-align:center;padding:5px 10px;width:100px;background-color:MediumSeaGreen;color:white;border-radius:20px;text-decoration:none;">Moins</a>
                <a href="javascript:void();" onclick="next();" style="text-align:center;padding:5px 10px;width:100px;background-color:MediumSeaGreen;color:white;border-radius:20px;text-decoration:none;">Plus</a>
            </div>
        </div>
        <div class="">
            <div style="margin-top:10px;display:flex;gap:10px;overflow:auto;padding:20px;
                 flex-wrap: wrap;justify-content:center;background-color: transparent;">

                <film v-for="film in films"
                  :title="film.original_title"
                  :path_backdrop="film.backdrop_path"
                  :src="'https://image.tmdb.org/t/p/w300/' + film.backdrop_path"
                  :poster_path="film.poster_path"
                  :srcposter="'https://image.tmdb.org/t/p/w342/' + film.poster_path"
                  :popularity="film.popularity"
                  :date="film.release_date"
                  :id="film.id"
                  onclick="consultationFilm(this)"
                  style="width:20%;background-color:white;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></film>
            </div>
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
                films:[],
                categories:[],
                pagination:true,
                categorie_selected:-1,
                tri:-1,
                courrent_page:0,
                total_page:0,
                certification_age:"",
                certifications:[]
            }
        })

        Vue.component('categorie', {
        props: ['options'],
        template:`
        <div>
            <select placeholder="Recherche par catégorie"
                style="padding:5px;outline:none;border:none; background-color:transparent; color:white; border-bottom: 2px solid MediumSeaGreen;text-align:left;" onchange="loadFilms(this);">
                <option value="-1" style="color:black;">Recherche par catégorie</option>
                <option v-for="option in options" :value="option.id" style="color:black;">{{option.name}}</option>
            </select>
        </div>
        `
        })

        Vue.component('film', {
            props: ['title', 'path_backdrop', 'src', 'popularity', 'date', 'poster_path', 'srcposter'],
            template:`
              <div style="border-top-left-radius:10px 10px; border-top-right-radius:10px 10px;">
                <img v-if="path_backdrop!=null" :src="src" width="100%" style="border-top-left-radius:10px 10px; border-top-right-radius:10px 10px;">
                <img v-else-if="poster_path!=null" :src="srcposter" width="100%" style="border-top-left-radius:10px 10px; border-top-right-radius:10px 10px;">
		        <p style="padding-left:5px;">Titre : {{ title }}</p>
                <p style="padding-left:5px;">Popularité : {{ popularity }}</p>
                <p style="padding-left:5px;">Date : {{ date }}</p>
	          </div>
            `
        })

        Vue.component('certification', {
            props: ['options'],
            template:`
            <div>
                <select placeholder="Filtre par certification d'âge FR"
                    style="padding:5px;outline:none;border:none; background-color:transparent; color:white; border-bottom: 2px solid MediumSeaGreen;text-align:left;" onchange="loadFilms(this);">
                    <option value="-1" style="color:black;">Recherche par catégorie</option>
                    <option v-for="option in options" :value="option.certification" style="color:black;">{{option.certification}}</option>
                </select>
            </div>
        `
        })

        // Récupérer la liste de genres
        function loadCaterogies(){
            axios.get('https://api.themoviedb.org/3/genre/movie/list?api_key=698099b300e1dd87a14b503850a01e56')
                .then(function (response) {
                    appF.categories = response.data.genres;
                    console.log(response.data.genres);
                })
                .catch(function (error) {
                    mess  = "Erreur ! Impossible d'accéder à l'API." + error
                })
        }

        function loadFilms(This){
            appF.films = [];
            appF.categorie_selected = This.value;
            api_loadFilms(1, This.value);
        }

        function api_loadFilms(page, caterogie){
            let url = "https://api.themoviedb.org/3/discover/movie?api_key=698099b300e1dd87a14b503850a01e56";

            if(appF.categorie_selected != -1){
                url = url + "&with_genres=" + appF.categorie_selected;
            }

            if(appF.tri != -1){
                url = url + "&sort_by=" + appF.tri;
            }

            if(appF.certification_age != ""){
                // à compléter avec filtre
            }

            url = url + '&page='+ page;

            axios.get(url)
            .then(function (response) {
                appF.courrent_page = response.data.page;
                appF.total_page = response.data.total_pages;
                if(appF.pagination == false){
                    appF.films = appF.films.concat(response.data.results);
                    if(response.data.total_pages > response.data.page){
                        api_loadFilms(response.data.page + 1,caterogie)
                    }
                }else{
                    appF.films = response.data.results;
                }
            })
            .catch(function (error) {
                mess  = "Erreur ! Impossible d'accéder à l'API." + error
            })
        }

        function searchFilms(This){
            appF.films = [];
            api_searchFilms(1, This.value);
        }

        function api_searchFilms(page, query){
            axios.get('https://api.themoviedb.org/3/search/movie?api_key=698099b300e1dd87a14b503850a01e56&language=en-US&page='+ page +'&include_adult=false&query=' + query)
                .then(function (response) {
                    appF.films = appF.films.concat(response.data.results);
                    if(response.data.total_pages > response.data.page){
                        api_searchFilms(response.data.page + 1, query)
                    }
                })
                .catch(function (error) {
                    mess  = "Erreur ! Impossible d'accéder à l'API." + error
                })
        }

        function applyTri(This){
            appF.tri = This.value;
            appF.films = [];
            api_loadFilms(1, This.value);
        }

        function next(){
            if(appF.courrent_page < appF.total_page){
                api_loadFilms(appF.courrent_page + 1, appF.categorie_selected);
            }
        }

        function prev(){
            if(appF.courrent_page > 1){
                api_loadFilms(appF.courrent_page - 1, appF.categorie_selected);
            }
        }

        function consultationFilm(This){
            window.location = "./consultation-film.php?filmId=" + This.id;
        }

        function getClassificationCourt(meaning){
            let result = meaning.indexOf(")");
            let resulti = meaning.indexOf("(");
            return meaning.substring(resulti+1, result);
        }

        function api_getCertificationFilmsFR(){
            axios.get('https://api.themoviedb.org/3/certification/movie/list?api_key=698099b300e1dd87a14b503850a01e56&language=en-US&')
                .then(function (response) {
                    appF.certifications = response.data.certifications.FR;
                    for(let i=0;i<appF.certifications.length;i++){
                        response.data.certifications.FR.meaning = getClassificationCourt(response.data.certifications.FR.meaning);
                    }
                    appF.certifications = response.data.certifications.FR;
                })
                .catch(function (error) {
                    mess  = "Erreur ! Impossible d'accéder à l'API." + error
                })
        }

        loadCaterogies();

        api_loadFilms(1, -1);

        api_getCertificationFilmsFR();

    </script>
</body>
</html>
