<?php
class DBBroker {

    private $mysqli;
    private static $broker;

    public function getMysqli(){
        return $this->mysqli;
    }

    private function __construct(){
        $this->mysqli = new mysqli("localhost", "root", "", "modelinggagencija");
        if ($this->mysqli->connect_errno){
            exit("Nauspesna konekcija: greska> ".$this->mysqli->connect_error.", err kod>".$this->mysqli->connect_errno);
        }
        $this->mysqli->set_charset("utf8");
    }

    public static function getBroker(){
        if(!isset($broker)){
            $broker = new DBBroker();
        }
        return $broker;
    }

    public function executeQuery($upit){
        return $this->mysqli->query($upit);
    }
}
?>
