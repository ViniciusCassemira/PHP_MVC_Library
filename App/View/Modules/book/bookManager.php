<?php
    include "view/header.php"; 

    if($result[0]->status == 'active'){
        $futureStatus = 'Inactive';
    }else{
        $futureStatus = 'Active';
    }
?>

    <h2 id="book_manager_title">
        Gerenciar livros
    </h2>

    <form action="/book/update" method="POST">
        <div>
            <label id="book_manager_name" for="bookManagerDescription">Nome</label>
            <input type="text" id="bookManagerDescription" name="description" value="<?php echo $result[0]->description; ?>">
        </div>

        <div>
            <label id="book_manager_code">Código</label>
            <input readonly style="background-color: gray; border:none;" type="number" name="code" value="<?php echo $result[0]->code; ?>">
        </div>
        
        <div>
            <label id="book_manager_genre" for="bookManagerGenre">Gênero</label>
            <select name="id_genre" id="bookManagerGenre">
                <?php
                foreach($genre as $_gender){
                    $selected = ($result[0]->genre_description == $_gender->description) ? 'selected' : '';
                    echo "<option value='{$_gender->id_genre}' {$selected}>{$_gender->description}</option>";
                }
                ?>
            </select>
        </div>

        
        <button id="book_manager_update_button">Atualizar</button>
    </form>

    <div>
        <a href="/book">
            <button id="book_manager_back_button">voltar</button>
        </a>

        <?php
        if($result[0]->status == "active" && $result[0]->available == "Available"){   
            echo"<a href='/book/situation?id_book={$result[0]->id_book}&status={$result[0]->status}'>
                <button id='book_manager_inactive_button'>{$futureStatus}</button>
            </a>";
        }

        if($result[0]->status == "inactive" && $result[0]->available == "Available"){   
            echo"<a href='/book/situation?id_book={$result[0]->id_book}&status={$result[0]->status}'>
            <button id='book_manager_active_button'>{$futureStatus}</button>
            </a>";
        }
        
        if(in_array($result[0]->id_book, $neverUsed)){   
            echo"<a href='/book/remove?id_book={$result[0]->id_book}'>
                <button id='book_manager_delete_button'>Delete</button>
            </a>";
        }
            ?>
    </div>

    
<?php include "view/footer.php"; ?>