<?php

require "../DBBroker.php";
require "../model.php";

$broker=DBBroker::getBroker();

if(isset($_POST['imePrezime']) && isset($_POST['agencija'])) {

    $model = new Model(null,$_POST['imePrezime'],$_POST['agencija']);
    $rezultat = Model::add($model, $broker);

    if(!$rezultat){
        echo $broker->getMysqli()->error;
    }else{ 
        echo '1';
    }
}


?>