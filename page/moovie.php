<?php
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
<?php echo  $_GET['id']?>


<script>

    function GetDataId(ID) {

           

        const container = document.getElementById("container")
        container.innerHTML = ""
        requette = 'https://api.themoviedb.org/3/movie/"' + ID + '"?api_key=cecfdcc4951a5a9c7eed2dd44b519117&language=fr'
        console.log(requette)
        /*axios.get(requette, {}).then(function (response) {
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
                    link.href = "moovie.php?id="+id

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
            });*/
        }


</script>



</body>
</html>
