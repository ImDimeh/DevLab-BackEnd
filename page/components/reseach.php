<?php
?>
<form method="POST" class="search">
    <input type="search" name="moovie" id="moovie_Id" placeholder="chercher votre film" >

</form>
<script>
    const recherche = document.getElementById("moovie_Id")
    console.log(recherche)



recherche.addEventListener("input" , e => {
    const value = e.target.value
    console.log(value)
})


</script>