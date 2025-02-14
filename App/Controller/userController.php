<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    class UserController{   

        public static function register(){
            if($_POST){
                if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])){
                    echo "Insira os dados corretamente";
                    include "view/Modules/user/userRegister.php";
                    return;
                }

                $user = new userModel(name:$_POST['name'],email:$_POST['email'],password:$_POST['password']);
                $result = $user->loginModel();

                if(count($result) != 0){
                    echo "Email já utilizado";
                    include "view/Modules/user/userRegister.php";
                    return;
                }

                $user->insertUser();

            }
            include "view/Modules/user/userRegister.php";
        } 

        public static function login(){
            if($_POST){
                if(empty($_POST['email']) || empty($_POST['password'])){
                    echo "Preencha os dados corretamente";
                    return;
                }
                $user = new userModel(email:$_POST["email"]);
                $result = $user->loginModel();

                if(count($result) == 1){
                    if (password_verify(trim($_POST["password"]), trim($result[0]->password))) {
                        if($result[0]->status == "active"){
                            
                            $_SESSION['name'] = $result[0]->name;
                            $_SESSION['id_user'] = $result[0]->id_user;
                            $_SESSION['id_role'] = $result[0]->id_role;

                            header('Location: /');
                            return; 
                        }
                        echo "Usuário inativo";
                        include "view/Modules/user/userLogin.php";
                        return;
                    }

                }
                echo "Caracteres inválidos";

            }
            include "view/Modules/user/userLogin.php";
        } 

        public static function manager(){
            if (!isset($_SESSION['id_role']) || $_SESSION['id_role'] != 2) {
                header("Location: /");
                exit();
            }

            $model = new userModel();
            $result = $model->selectUser();

            include "view/Modules/user/userManager.php";
        } 
        
        public static function logout(){
            $_SESSION = [];
            session_destroy();
            header('location:/');
        } 
        
        public static function changeStatus(){
            if (!isset($_SESSION['id_role']) || $_SESSION['id_role'] != 2) {
                header("Location: /");
                exit();
            }
            
            if($_GET['status'] == 'active'){
                $situacao = 'inactive';
            }else{
                $situacao = 'active';
            }

            $user = new userModel(id_user:$_GET['id_user'],status:$situacao);
            $user->changeStatus();
            header('location:/user');
        }
        public static function changeRole(){
            if (!isset($_SESSION['id_role']) || $_SESSION['id_role'] != 2) {
                header("Location: /");
                exit();
            }

            if($_GET['id_role'] == 1){
                $id_role = 2;
            }else{
                $id_role = 1;
            }

            $user = new userModel(id_user:$_GET['id_user'],id_role:$id_role);
            $user->changeRole();
            header('location:/user');
        }
    }