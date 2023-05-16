<?php

require "../DBBroker.php";
require "../model.php";

$broker=DBBroker::getBroker();

if(isset($_POST['id'])){
    $model = new Model($_POST['id']);
    $rezultat = $model->deleteById($broker);
    if(!$rezultat){
        echo $broker->getMysqli()->error;
     }else{
         echo '1';
     }
}

?>