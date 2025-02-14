<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

Class BookingController{
    public static function start(){

        $model = new BookingModel(id_user:$_SESSION['id_user']);
        
        if($_SESSION['id_role'] == 2){
            $result = $model->selectAll();
            include "view/Modules/booking/bookingAdmViewer.php";
        }else{
            $result = $model->select();
            include "view/Modules/booking/bookingViewer.php";
        }

    }

    public static function register(){
        
        $books = BookController::selectAvailable();

        if($_POST){
            echo "a";

            if(empty($_POST['id_book'])){
                echo "Selecione um livro";
                return;
            }

            $model = new BookingModel(id_book:$_POST['id_book'],id_user:$_SESSION['id_user'],booking_date:date('Y-m-d'));
            $model->insert();
            
            header('location: /booking');

            return;
        }

        include "view/Modules/booking/bookingForm.php";
    }

    public static function return(){
        $id_booking = $_GET['id_booking'];

        $booking = new BookingModel(id_booking:$id_booking,return_date:date('Y-m-d'));
        $booking->return();
        header('location: /booking');
    }

}