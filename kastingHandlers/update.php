<?php

require "../DBBroker.php";
require "../kasting.php";

$broker=DBBroker::getBroker();

if(isset($_POST['model']) && isset($_POST['nazivKastinga']) && isset($_POST['datum']) 
 && isset($_POST['id']) ) {

    $kastingpre = new Kasting($_POST['id']);
    $kastingposle = new Kasting(null,$_POST['model'],$_POST['nazivKastinga'],$_POST['datum']);
    $rezultat = $kastingpre->update($kastingposle, $broker);

    if(!$rezultat){
        echo $broker->getMysqli()->error;
     }else{ 
         echo '1';
     }
}

?>