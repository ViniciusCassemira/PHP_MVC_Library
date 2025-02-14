<?php

require_once "config.php";

class userDAO{

    private $connect;

    public function __construct() {
        $dsn = 'mysql:host='.DB_HOST.':'.DB_PORT.';dbname='.DB_NAME;
        $this->connect = new PDO($dsn, DB_USER, DB_PASS);
    }

    public function insert(userModel $model){
        $sql = "INSERT INTO users(name,email,password) VALUES(?, ?, ?)";

        $stmt = $this->connect->prepare($sql);
        
        $stmt->bindValue(1, $model->name);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->password);
        $stmt->execute();
    }

    public function delete(string $email){
        $sql = "DELETE FROM users WHERE email = ?";

        $stmt = $this->connect->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->execute();
    }

    public function login(userModel $model){
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindValue(1, $model->email);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function select(){
        $sql = "SELECT u.id_user, u.name,u.email,u.status,r.description, u.id_role FROM users u JOIN roles r ON (u.id_role = r.id_role)";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function changeStatus(userModel $user){
        $sql = "UPDATE users SET status = ? WHERE id_user = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindValue(1,$user->status);
        $stmt->bindValue(2,$user->id_user);

        $stmt->execute();
    }

    public function changeRole(userModel $user){
        $sql = "UPDATE users SET id_role = ? WHERE id_user = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindValue(1,$user->id_role);
        $stmt->bindValue(2,$user->id_user);

        $stmt->execute();
    }

}