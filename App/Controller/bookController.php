<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class BookController {
    
    public static function changeSituation(){

        if (!isset($_SESSION['id_role']) || $_SESSION['id_role'] != 2) {
            header("Location: /");
            exit();
        }
            
        if($_GET['status'] == 'active'){
            $status = 'inactive';
        }else{
            $status = 'active';
        }
    
        $book = new bookModel(id_book:$_GET['id_book'],status:$status);
        $book->changeSituation();
        header('location:/book');
        return;
    }

    public static function manager(){

        if (!isset($_SESSION['id_role']) || $_SESSION['id_role'] != 2) {
            header("Location: /");
            exit();
        }

        $model = new bookModel(id_book:$_GET['id_book']);
        $genre = genderController::select();

        $result = $model->select();
        $neverUsed = $model->neverUsed();

        include "view/modules/book/bookManager.php";
    }

    public static function register(){

        if (!isset($_SESSION['id_role']) || $_SESSION['id_role'] != 2) {
            header("Location: /");
            exit();
        }

        $genders = genderController::select();

        if($_POST){

            if(empty($_POST['description']) || empty($_POST['code']) || empty($_POST['id_genre'])){
                echo "preencha os campos corretamente";
                BookController::start();
                return;
            }

            $codeBookTest = BookController::selectCode();

            if(in_array($_POST['code'],$codeBookTest)){
                echo "Código já existente";
                BookController::start();
                return;
            }

            $model = new bookModel(description:$_POST['description'], code:$_POST['code'], id_genre:$_POST['id_genre']);
            $model->insert();
            
            BookController::start();

            return;

        }

        include "view/modules/book/bookForm.php";
    }

    public static function remove(){

        if (!isset($_SESSION['id_role']) || $_SESSION['id_role'] != 2) {
            header("Location: /");
            exit();
        }

        if(empty($_GET['id_book'])){
            header('Location: /book');
            return;
        }

        $model = new bookModel(id_book:$_GET['id_book']);
        $model->remove();

        header('Location: /book');
        return;
    }

    public static function selectAvailable(){
        $model = new bookModel();
        $result = $model->selectAvailable();
        return $result;
    }

    public static function selectCode(){
        $model = new bookModel();
        $result = $model->selectCode();
        return $result;
    }

    public static function start(){
        if (!isset($_SESSION['id_role'])) {
            header("Location: /");
            exit();
        }
            
        $model = new bookModel();
        
        if($_SESSION['id_role'] == 2){
            $result = $model->selectAll();
            include "view/modules/book/bookViewerAdm.php";
        }else{
            $result = $model->selectActive();
            include "view/modules/book/bookViewer.php";
        }

    }

    public static function update(){

        if (!isset($_SESSION['id_role']) || $_SESSION['id_role'] != 2) {
            header("Location: /");
            exit();
        }

        if($_POST){

            if(empty($_POST['description']) || empty($_POST['id_genre'])){
                echo "preencha os campos corretamente";
                BookController::start();
                return;
            }

            $model = new bookModel(description:$_POST['description'], code:$_POST['code'], id_genre:$_POST['id_genre']);
            $model->update();

            BookController::start();
            return;

        }

        BookController::start();

    }

}
?>
