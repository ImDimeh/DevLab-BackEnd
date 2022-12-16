<?php
?>

<button onclick="GetDataByLink('https://api.themoviedb.org/3/movie/popular?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&page=500')"
        id="changeButton"> les moins populaire</button>

<button onclick="GetDataByLink('https://api.themoviedb.org/3/movie/popular?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&page=1')"  id="changeButton"> les plus populaire </button>

<button onclick="GetDataByLink('https://api.themoviedb.org/3/movie/top_rated?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&page=1')"  id="changeButton"> les mieux notée</button>
<button onclick="GetDataByLink('https://api.themoviedb.org/3/movie/top_rated?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&page=500')"  id="changeButton"> les moins bien notée</button>

<button onclick="GetDataByLink('https://api.themoviedb.org/3/discover/movie?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&sort_by=title.asc&page=1')"  id="changeButton"> Par nom </button>

<button onclick="GetDataByLink()"  id="changeButton"> les plus visionné</button>

<button onclick="GetDataByLink()"  id="changeButton"> Age </button>


<div id="container" class=" h-1/10 w-5/6 bg-red-800 flex-row flex justify-around  flex-wrap">

</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<?php


require 'function.php';
?>
