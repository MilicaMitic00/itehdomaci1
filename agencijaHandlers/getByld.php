<?php

require "../agencija.php";
require '../DBBroker.php';

$broker=DBBroker::getBroker();

if(isset($_POST['id'])){

    $resultSet = Agencija::getById($_POST['id'], $broker);
    $response=[];

    if(!$resultSet){
        $response['status']=0;
        $response['greska']=$broker->getMysqli()->error;
    } 
    else{
    $response['status']=1;
        while($row=$resultSet->fetch_object()){
            $response['agencija'][]=$row;
        }
    }
echo json_encode($response);
}

?>