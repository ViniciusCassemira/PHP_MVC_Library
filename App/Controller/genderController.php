<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

class GenderController {
    public function __construct() {
            if (!isset($_SESSION['id_role']) || $_SESSION['id_role'] != 2) {
                header("Location: /");
                exit();
            }
    } 

    public static function select(){
        $model = new genderModel();
        $result = $model->selectGender();
        
        return $result;
    }
    
    public static function selectName(){
        $model = new genderModel();
        $result = $model->selectName();
        
        return $result;
    }
    
    public static function start(){
        $controller = new GenderController();
        $result = $controller->select();
        include "view/modules/gender/genderViewer.php";
    }

    public static function register(){
        $controller = new GenderController();

        if($_POST){
            
            if(empty($_POST['description'])){
                echo "preencha os campos";
                $controller->start();
                return;
            }

            $genderTest = $controller->selectName();
            
            if(in_array($_POST['description'],$genderTest)){
                echo "Gênero já existente";
                $result = $controller->start();
                return;
            }

            
            $model = new genderModel(description:$_POST['description']);
            $model->insert();

            header('location: /gender');
            return;
        }
        include "view/modules/gender/genderForm.php";
    }

    public static function remove(){
        if (empty($_GET['id_genre'])){
            header('Location: /gender');
            return;
        }
        
        $model = new genderModel(id_genre:$_GET['id_genre']);
        $model->remove();
        
        header('Location: /gender');
        return;
    }
}
?>
