<?php
    include "view/header.php";
?>

<h1 id="genres_title" >Genres</h1>

<a href="/gender/register">
    <button id="genres_genre_button">
        Add genre
    </button>
</a>

<table class="tableView">
    <thead>
        <tr>
           <th id="genres_description_table">Description</th> 
           <th id="genres_book_table">Register books</th> 
           <th id="genres_action_table">Action</th> 
        </tr>
    </thead>
    
    <tbody>
        <?php
            foreach($result as $item){
                echo "<tr>";
                    echo "<td>{$item->description}</td>";
                    echo "<td>{$item->total}</td>";
                    if($item->total == 0){
                        echo "<td>
                                <a href='/gender/remove?id_genre=$item->id_genre'>
                                    <button class='genres_delete_button'>Excluir gênero</button>
                                </a>
                            </td>";
                        }
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

<?php
    include "view/footer.php";
?>