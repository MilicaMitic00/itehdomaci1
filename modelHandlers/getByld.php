<?php

require "../model.php";
require '../DBBroker.php';

$broker=DBBroker::getBroker();

if(isset($_GET['id'])){

    $resultSet = Model::getById($_GET['id'], $broker);
    $response=[];

    if(!$resultSet){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
    } 
    else{
    $response['status']=1;
    $response['model']=$resultSet->fetch_object();

    }

    echo json_encode($response);
}

?>