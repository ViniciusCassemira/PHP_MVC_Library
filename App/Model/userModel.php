<?php

class userModel{
    public function __construct(public int $id_user =0,
                                public string $name = "", 
                                public string $email = "", 
                                public string $password = "", 
                                public string $status = "",
                                public int $id_role = 0
                                ){}


    public function selectUser(){
        $dao = new userDAO;
        $result = $dao->select();

        return $result;
    }

    public function changeStatus(){
        $dao = new userDAO();
        $dao->changeStatus($this);   
    }

    public function changeRole(){
        $dao = new userDAO();
        $dao->changeRole($this);   
    }
    
    public function loginModel(){
        $dao = new userDAO();
        return $dao->login($this);
    }

    public function insertUser(){
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $dao = new userDAO();
        $dao->insert($this);
    }

}