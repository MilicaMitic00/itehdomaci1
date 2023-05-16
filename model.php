<?php

class Model {

    public $id;   
    public $imePrezime;   
    public $agencija;   

    public function __construct($id=null, $imePrezime=null, $agencija=null)
    {
        $this->id = $id;
        $this->imePrezime = $imePrezime;
        $this->agencija = $agencija;
    }

    public static function getAll(DBBroker $broker)
    {
        $query = "SELECT m.*, a.NazivAgencije as agencija_NazivAgencije, count(k.id) as broj_kastinga FROM model m 
        INNER JOIN agencija a on (m.agencija=a.id) LEFT JOIN kasting k on (m.id=k.model) GROUP BY m.id ORDER BY m.id";
        return $broker->executeQuery($query);
    }

    public static function getById($id,DBBroker $broker){
        $query = "SELECT * FROM model WHERE id=$id";
        return $broker->executeQuery($query);
    }

    public function deleteById(DBBroker $broker)
    {
        $query = "DELETE FROM model WHERE id=$this->id";
        return $broker->executeQuery($query);
    }

    # ili da zovemo nad objektom koji menjamo a prosledjujemo id
    public function update(Model $model,DBBroker $broker)
    {
        $query = "UPDATE model set imePrezime = '$model->imePrezime',agencija = $model->agencija WHERE id=$this->id";
        return $broker->executeQuery($query);
    }

    public static function add(Model $model,DBBroker $broker)
    {
        $query = "INSERT INTO model(imePrezime, agencija) VALUES('$model->imePrezime','$model->agencija')";
        return $broker->executeQuery($query);
    }
}

?>