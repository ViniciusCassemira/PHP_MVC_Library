<?php
    include "view/header.php";
?>

<h1 id="book_form_title">Book register</h1>

<form action="/book/register" method="POST">
    <input type="text" id="book_form_name" name="description" placeholder="Book's name" required>
    
    <input type="number" id="book_form_code" name="code" placeholder="Book's code" required>

    <select name="id_genre" id="id_genre" required>
        <?php
            echo "<option id='book_form_genre' value='' disabled selected>Choice a genre</option>";
            foreach($genders as $gender){
                echo "<option value='{$gender->id_genre}'>{$gender->description}</option>";
            }
        ?> 
    </select>

    
    <button id="book_form_button">Register</button>

</form>

</div>

<?php
    include "view/footer.php";
?>