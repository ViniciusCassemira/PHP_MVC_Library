<?php
    include "view/header.php";
?>
    <h2 id="books_title">Books</h2>

    <table class="tableView">
    <thead>
        <tr>
            <th id="books_code_table">Code</th>
            <th id="books_title_table">Title</th>
            <th id="books_genre_table">Genre</th>
            <th id="books_available_table">Available</th>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach($result as $book){

        echo"<tr>"; 
        echo "<td>{$book->code}</td>";
        echo "<td>{$book->description}</td>";
        echo"<td>{$book->genre_description}</td>";
        echo"<td>{$book->available}</td>";
        echo"</tr>";
        }
        ?>
    </tbody>
</table>

</div>

<?php
    include "view/footer.php";
?>