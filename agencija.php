<?php

class Agencija{

    public $id;   
    public $NazivAgencije;   

    public function __construct($id=null, $NazivAgencije=null)
    {
        $this->id = $id;
        $this->NazivAgencije = $NazivAgencije;
    }

    public static function getAll(DBBroker $broker)
    {
        $query = "SELECT * FROM agencija";
        return $broker->executeQuery($query);
    }

    public static function getById($id,DBBroker $broker)
    {
        $query = "SELECT * FROM agencija WHERE id=$id";
        return $broker->executeQuery($query);
    }
}

?>