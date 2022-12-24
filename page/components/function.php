<?php
?>
<script>

    function test(){
    
          axios.get("https://api.themoviedb.org/3/genre/movie/list?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr", {}).then(function (response) {
            const Genres = response.data.genres

            console.log(Genres);
            Genres.forEach(data => {

                document.getElementById("genre")

                console.log(data.name);
                const genre = document.createElement('button');
                

                    const GenreName = data.name
                    genre.innerText = GenreName ;
                    
                    genre.onclick = GetDataByLink('https://api.themoviedb.org/3/discover/movie?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&sort_by=title.asc&page=1&with_genres=' + data.id)

                    genre.setAttribute('id',data.id);
                    console.log(genre)
                    //https://api.themoviedb.org/3/discover/movie?api_key=###&with_genres=28
                    

                     document.getElementById("genre").appendChild(genre);
                    

            }
                
            )
        })
}

const genre = document.querySelector('#genre');


document.addEventListener('DOMContentLoaded', event => {
    test()
  
});


    function GetDataByLink(link) {



        const container = document.getElementById("container")
        container.innerHTML = ""
        requette = link
        axios.get(requette, {}).then(function (response) {
            const datas = response.data.results

            //console.log(datas);

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

                    const link = document.createElement("a")
                    const id = data.id
                link.innerText = "en savoir plus sur le film "
                    link.href = "moovie?id="+id

                    //console.log(link)
                container.appendChild(link)

                    const img = document.createElement('img');
                    const affiche = data.backdrop_path

                    img.src = "https://image.tmdb.org/t/p/w500" + affiche

                    img.classList.add("w-36")

                    container.appendChild(img)

                    //console.log( titre)
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
