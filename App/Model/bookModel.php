<?php
class bookModel {
    public function __construct(
        public int $id_book = 0,
        public string $description = '',
        public int $code = 0,
        public string $status = '',
        public int $id_genre = 0

    ) {}
    
    public function changeSituation(){
        $dao = new bookDAO();
        $dao->changeSituation($this);
    }

    public function insert(){
        $dao = new bookDAO();
        $dao->insert($this);
    }

    public function neverUsed(){
        $dao = new bookDao();
        return $dao->selectNeverUsed();
    }

    public function remove(){
        $dao = new bookDAO();
        $dao->remove($this);
    }

    public function select(){
        $dao = new bookDAO();
        return $dao->selectBook($this);
    }

    public function selectAll(){
        $dao = new bookDAO();
        return $dao->select();
    }

    public function selectActive(){
        $dao = new bookDAO();
        return $dao->selectActive();
    }

    public function selectAvailable(){
        $dao = new bookDAO();
        return $dao->selectAvailable(); 
    }

    public function selectCode(){
        $dao = new bookDAO();
        return $dao->selectCode();
    }

    public function update(){
        $dao = new bookDAO();
        $dao->update($this);
    }
    
}
?>
