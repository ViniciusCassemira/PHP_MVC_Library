<?php

require_once "config.php";

class genderDAO{

private $connect;

public function __construct() {
    $dsn = 'mysql:host='.DB_HOST.':'.DB_PORT.';dbname='.DB_NAME;
    $this->connect = new PDO($dsn, DB_USER, DB_PASS);
}

public function insert(genderModel $model){
    $sql = "INSERT INTO genres(description) values(?)";
    $stmt = $this->connect->prepare($sql);
    $stmt->bindValue(1,$model->description);
    $stmt->execute();
}

public function select(){
    $sql = "SELECT 
        g.description, 
        g.id_genre, 
        COUNT(b.id_book) AS total
    FROM 
        genres g
    LEFT JOIN 
        books b 
    ON 
        g.id_genre = b.id_genre
    GROUP BY 
        g.description, g.id_genre";
    $stmt = $this->connect->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

public function selectName(){
    $sql = "SELECT description FROM genres";

    $stmt = $this->connect->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

public function remove(genderModel $model){
    $sql = "DELETE FROM genres WHERE id_genre = ?";

    $stmt = $this->connect->prepare($sql);
    $stmt->bindValue(1, $model->id_genre);
    $stmt->execute();
}

}