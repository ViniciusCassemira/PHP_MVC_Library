<?php
    include "view/header.php";
?>
    <h2 id="books_title">Books</h2>

    <?php
    
        echo "<div id = 'button-space'>";
        echo "<a href='/book/register'>
            <button id='books_book_button'>
                Add book
            </button>
        </a>";

        echo "<a href='/gender'>
            <button id='books_genre_button'>
                Genres
            </button>
        </a>";
        echo "</div>";

    ?>

    <table class="tableView">
    <thead>
        <tr>
            <th id="books_code_table">Code</th>
            <th id="books_title_table">Title</th>
            <th id="books_genre_table">Genre</th>
            <th id="books_status_table">Status</th>
            <th id="books_available_table">Available</th>
            <th id="books_action_table">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach($result as $book){
        echo"<tr>";
        echo "<td>{$book->code}</td>";
        echo "<td>{$book->description}</td>";
        echo"<td>{$book->genre_description}</td>";
        echo"<td>{$book->status}</td>";
        echo"<td>{$book->available}</td>";
        echo"<td>
            <a href='/book/manager?id_book=$book->id_book'>
                <button class='books_edit_button'>
                    edit
                </button>
            </a>
        </td>";
        echo"</tr>";
        
        }
        ?>
    </tbody>
</table>

</div>

<?php
    include "view/footer.php";
?>