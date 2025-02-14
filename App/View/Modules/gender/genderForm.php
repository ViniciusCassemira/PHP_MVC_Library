<?php
    include "view/header.php";
?>

<h1 id="genre_form_title">Genre register</h1>

<form action="/gender/register" method="POST">
    
    <input type="text" id="genre_form_name" name="description" placeholder="Type a genre">

    <button id="genre_form_button">Register</button>

</form>

<?php
    include "view/footer.php";
?>