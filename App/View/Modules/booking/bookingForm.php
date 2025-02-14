<?php
    include "view/header.php";
?>

<h1 id="booking_form_title">Book scheduling</h1>

<form action="/booking/register" method="POST">

    <div>

        <label for="id_book" id="booking_form_name">Book</label>
        <select name="id_book" id="id_book">
            <?php
            foreach($books as $book){
                echo "<option value='{$book->id_book}'>{$book->description}</option>";
            }
            ?> 
        </select>
    </div>
    
    <button id="booking_form_button">schedule</button>

</form>

</div>

<?php
    include "view/footer.php";
?>