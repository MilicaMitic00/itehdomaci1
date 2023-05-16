<?php

require "../model.php";
require '../DBBroker.php';

$broker=DBBroker::getBroker();

    $resultSet = Model::getAll($broker);
    $response=[];

    if(!$resultSet){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
    } 
    else{
    $response['status']=1;
        while($row=$resultSet->fetch_object()){
            $response['modeli'][]=$row;
        }
    }
    echo json_encode($response);

?>