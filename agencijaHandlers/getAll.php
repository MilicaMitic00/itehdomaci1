<?php

require "../agencija.php";
require '../DBBroker.php';

$broker=DBBroker::getBroker();

$resultSet = Agencija::getAll($broker);
$response=[];

if(!$resultSet){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
} 
else{
    $response['status']=1;
    while($row=$resultSet->fetch_object()){ 
        $response['agencije'][]=$row;
    }
echo json_encode($response);
}

?>