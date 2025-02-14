<?php

require_once 'config.php';

class bookDAO{

    private $connect;

    public function __construct() {
        $dsn = 'mysql:host='.DB_HOST.':'.DB_PORT.';dbname='.DB_NAME;
        $this->connect = new PDO($dsn, DB_USER, DB_PASS);
    }

public function changeSituation(bookModel $model){
    $sql = "UPDATE books SET status = ? WHERE id_book = ?";
    $stmt = $this->connect->prepare($sql);
    $stmt->bindValue(1,$model->status);
    $stmt->bindValue(2,$model->id_book);

    $stmt->execute();
}

public function insert(bookModel $model){
    $sql = "INSERT INTO books(description, code, id_genre) values(?,?,?)";
    $stmt = $this->connect->prepare($sql);
    $stmt->bindValue(1,$model->description);
    $stmt->bindValue(2,$model->code);
    $stmt->bindValue(3,$model->id_genre);
    
    $stmt->execute();
}

public function remove(bookModel $model){
    $sql = "DELETE FROM books WHERE id_book = ?";
    $stmt = $this->connect->prepare($sql);
    $stmt->bindValue(1, $model->id_book);

    $stmt->execute();
}

public function select(){
    $sql = "SELECT 
            b.id_book,
            b.description,
            b.code,
            b.status,
            b.id_genre,
            g.description as 'genre_description',
            CASE 
                WHEN b.id_book IN (SELECT id_book FROM bookings WHERE status = 'Pending') THEN 'Unavailable'
                ELSE 'Available'
            END AS 'available'
        FROM books b 
        JOIN genres g ON (g.id_genre = b.id_genre)";

    $stmt = $this->connect->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}   

public function selectActive(){
    $sql = "SELECT 
            b.id_book,
            b.description,
            b.code,
            b.status,
            b.id_genre,
            g.description as 'genre_description',
            CASE 
                WHEN b.id_book IN (SELECT id_book FROM bookings WHERE status = 'Pending') THEN 'Unavailable'
                ELSE 'Available'
            END AS 'available'
        FROM books b 
        JOIN genres g ON (g.id_genre = b.id_genre)
        WHERE b.status = 'active'";

    $stmt = $this->connect->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}   

public function selectAvailable(){
    $sql = "SELECT b.id_book,b.description, b.code, b.id_genre, g.description as 'genre_description' FROM books b JOIN genres g ON (g.id_genre = b.id_genre)
     WHERE b.id_book NOT IN (SELECT id_book FROM bookings WHERE status = 'Pending') AND b.status = 'active'";
    $stmt = $this->connect->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

public function selectBook(bookModel $model){
    $sql= "SELECT 
            b.id_book,
            b.description,
            b.code,
            b.status,
            b.id_genre,
            g.description as 'genre_description',
            CASE 
                WHEN b.id_book IN (SELECT id_book FROM bookings WHERE status = 'Pending') THEN 'Unavailable'
                ELSE 'Available'
            END AS 'available'
            FROM books b INNER JOIN genres g ON (g.id_genre = b.id_genre)
            WHERE id_book = ?";

    $stmt = $this->connect->prepare($sql);
    $stmt->bindValue(1,$model->id_book);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

public function selectCode(){
    $sql = "SELECT code FROM books";

    $stmt = $this->connect->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

public function selectNeverUsed(){
    $sql = "SELECT b.id_book FROM books b 
            LEFT JOIN bookings a 
            ON (b.id_book = a.id_book)
            WHERE a.id_book IS NULL";

    $stmt = $this->connect->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

public function update(bookModel $model){
    $sql = "UPDATE books SET description = ?, id_genre = ? 
            WHERE code = ?;";
    $stmt = $this->connect->prepare($sql);

    $stmt->bindValue(1,$model->description);
    $stmt->bindValue(2,$model->id_genre);
    $stmt->bindValue(3,$model->code);
    
    $stmt->execute();
}

}