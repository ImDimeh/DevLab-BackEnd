<?php
?>
/
<button onclick="GetDataByLink('https://api.themoviedb.org/3/movie/popular?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&page=1')"
        id="changeButton"> les moins populaire</button>

<button onclick="GetDataByLink('https://api.themoviedb.org/3/movie/popular?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&page=500')"  id="changeButton"> les plus populaire </button>

<button onclick="changePopular()"  id="changeButton"> les mieux notée</button>
<button onclick="changePopular()"  id="changeButton"> les moins bien notée</button>

<button onclick="changePopular()"  id="changeButton"> Par nom </button>

<button onclick="changePopular()"  id="changeButton"> les plus visionné</button>

<button onclick="changePopular()"  id="changeButton"> Age </button>


<div id="container" class=" h-1/10 w-5/6 bg-[#29528A] flex-row flex justify-around  flex-wrap">

</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function GetDataByLink(link) {



        const container = document.getElementById("container")
        container.innerHTML = ""
        requette = link
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

    }

</script>