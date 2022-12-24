<?php
?>
<form method="POST" class="search">
    <input type="search" name="moovie" id="moovie_Id" placeholder="chercher votre film" >

</form>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const recherche = document.getElementById("moovie_Id")
    console.log(recherche)



recherche.addEventListener("input" , e => {
    const value = e.target.value

    req = "https://api.themoviedb.org/3/search/movie?api_key=cecfdcc4951a5a9c7eed2dd44b519117&query=" + value
    req = req.replaceAll(" " , "+" )
    console.log(req)
    axios.get(req, {}).then(function (response) {
        const datas = response.data.results
        console.log(datas);

    })
        .catch(function (error) {
            console.log(error);
        })
        .then(function () {
            console.log("fin de la requette ")
        });
})


</script>