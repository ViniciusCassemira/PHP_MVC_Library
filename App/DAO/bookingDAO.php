<?php

require_once "config.php";

class BookingDAO{

private $connect;

public function __construct() {
    $dsn = 'mysql:host='.DB_HOST.':'.DB_PORT.';dbname='.DB_NAME;
    $this->connect = new PDO($dsn, DB_USER, DB_PASS);
}

public function select(BookingModel $model){
    $sql = "SELECT b.id_booking, b.id_book, b.id_user, 
            DATE_FORMAT(b.booking_date,'%d %m %Y') AS booking_date,
            DATE_FORMAT(b.return_date,'%d %m %Y') AS return_date, 
            b.status, bo.description 
            FROM bookings b INNER JOIN books bo 
            ON (bo.id_book = b.id_book) WHERE id_user = ?";
    $stmt = $this->connect->prepare($sql);
    $stmt->bindValue(1,$model->id_user);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

public function selectAll(){
    $sql = "SELECT b.id_booking, b.id_book, b.id_user, DATE_FORMAT(b.booking_date,'%d %m %Y') AS booking_date, DATE_FORMAT(b.return_date,'%d %m %Y') AS return_date, b.status, bo.description as 'book_description', u.name as 'user_name'
            FROM bookings b INNER JOIN books bo ON (bo.id_book = b.id_book)
            INNER JOIN users u ON (u.id_user = b.id_user)";
    $stmt = $this->connect->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

public function insert(BookingModel $model){
    $sql = "INSERT INTO bookings(id_book,id_user,booking_date) values(?,?,?)";
    $stmt = $this->connect->prepare($sql);
    $stmt->bindValue(1,$model->id_book);
    $stmt->bindValue(2,$model->id_user);
    $stmt->bindValue(3,$model->booking_date);

    $stmt->execute();
}

public function return(BookingModel $model){
    $sql = "UPDATE bookings SET status = 'Completed', return_date = ?
            WHERE id_booking = ?";
    $stmt = $this->connect->prepare($sql);
    $stmt->bindValue(1, $model->return_date);
    $stmt->bindValue(2, $model->id_booking);

    $stmt->execute();
}

}