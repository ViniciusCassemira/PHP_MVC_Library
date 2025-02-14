<?php

class genderModel{
    public function __construct(public int $id_genre = 0,
                                public string $description = ""){}


    public function selectGender(){
        $dao = new genderDAO();
        $result = $dao->select();

        return $result;
    }

    public function insert(){
        $dao = new genderDAO();
        $dao->insert($this);
    }

    public function selectName(){
        $dao = new genderDAO();
        $result = $dao->selectName();

        return $result;
    }

    public function remove(){
        $dao = new genderDAO();
        $dao->remove($this);
    }

}