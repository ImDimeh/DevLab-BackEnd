<?php
?>
<script>

    
                

function AddAgeMoovie(){
    
          axios.get("https://api.themoviedb.org/3/certification/movie/list?api_key=cecfdcc4951a5a9c7eed2dd44b519117", {}).then(function (response) {
            const certification = response.data.certifications.FR

            console.log(certification);
                certification.forEach(data => {

                

                console.log(data.certification);
                const certif = document.createElement('button');
                

                    const AgeMinValue = data.certification
                    certif.innerText = AgeMinValue ;
                    
                    
                  //  genre.onclick ="GetDataByLink('https://api.themoviedb.org/3/discover/movie?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&sort_by=title.asc&page=1&with_genres=' + data.id)"

                  certif.setAttribute('OnClick' , "GetDataByLink('https://api.themoviedb.org/3/discover/movie?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr&sort_by=popularity.desc&certification_country=FRcertification=" +  data.certification + "')" ) 
                   // genre.setAttribute('id',data.id);
                   
                    console.log(certif)
                    
                    //https://api.themoviedb.org/3/discover/movie?api_key=###&with_genres=28
                    

                     document.getElementById("certifications").appendChild(certif);
                    

            }
                
            )
        })
}

const genre = document.querySelector('#genre');


document.addEventListener('DOMContentLoaded', event => {
    addGenreMoovie()
    AddAgeMoovie()
  
});


    function GetDataByLink(link) {

            console.log("function")

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
