<?php
class Kasting {

    public $id;   
    public $model;   
    public $datum;   
    public $nazivKastinga;

    public function __construct($id=null, $model=null,  $nazivKastinga=null, $datum=null)
    {
        $this->id = $id;
        $this->model = $model;
        $this->nazivKastinga = $nazivKastinga;
        $this->datum = $datum;
    }


    public static function getAll(DBBroker $broker)
    {
        $query = "SELECT k.*, m.imePrezime as model_imePrezime FROM kasting k INNER JOIN model m on (k.model=m.id)";
        return $broker->executeQuery($query);
    }

    public static function getById($id,Broker $broker){
        $query = "SELECT * FROM kasting WHERE id=$id";
        return $broker->executeQuery($query);
    }

    public static function getAllByModel($id,DBBroker $broker){
        $query = "SELECT * FROM kasting WHERE model=$id";
        return $broker->executeQuery($query);
    }

    public function deleteById(DBBroker $broker)
    {
        $query = "DELETE FROM kasting WHERE id=$this->id";
        return $broker->executeQuery($query);
    }

    public function update(Kasting $kasting, DBBroker $broker)
    {
        $query = "UPDATE kasting set model = $kasting->model,nazivKastinga = '$kasting->nazivKastinga',datum = '$kasting->datum' WHERE id=$this->id";
        return $broker->executeQuery($query);
    }

    public static function add(Kasting $kasting, DBBroker $broker)
    {
        $query = "INSERT INTO kasting(model, nazivKastinga, datum) VALUES('$kasting->model','$kasting->nazivKastinga','$kasting->datum')";
        return $broker->executeQuery($query);
    }
}
?>