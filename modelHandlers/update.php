<?php

require "../DBBroker.php";
require "../model.php";

$broker=DBBroker::getBroker();

if(isset($_POST['imePrezime']) && isset($_POST['agencija']) && isset($_POST['id']) ) {

    $modelkojisemenja = new model($_POST['id'], null, null);
    $modelkojimsemenja = new model(null,$_POST['imePrezime'],$_POST['agencija']);
    $rezultat = $modelkojisemenja->update($modelkojimsemenja, $broker);

    if(!$rezultat){
        echo $broker->getMysqli()->error;
     }else{ 
         echo '1';
     }

}

?>