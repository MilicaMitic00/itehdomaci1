<?php

require "../DBBroker.php";
require "../kasting.php";

$broker=DBBroker::getBroker();

if(isset($_POST['id'])){

    $kasting = new Kasting($_POST['id']);
    $rezultat = $kasting->deleteById($broker);

        if(!$rezultat){
            echo $broker->getMysqli()->error;
        }else{
            echo '1';
        }
}

?>