<?php

class BookingModel{
    public function __construct(public int $id_booking = 0,
                                public int $id_book = 0,
                                public int $id_user = 0,
                                public string $booking_date = '',
                                public string $return_date = '',
                                public string $status = ''){}

    public function insert(){
        $dao = new bookingDAO();
        $dao->insert($this);
    }

    public function selectAll(){
        $dao = new bookingDAO();
        return $dao->selectAll();
    }

    public function select(){
        $dao = new bookingDAO();
        return $dao->select($this);
    }

    public function return(){
        $dao = new bookingDAO();
        $dao->return($this);
    }
}