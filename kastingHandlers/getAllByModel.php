<?php

require "../kasting.php";
require '../DBBroker.php';

$broker=DBBroker::getBroker();

if(isset($_GET['id'])){
    $resultSet = Kasting::getAllByModel($_GET['id'], $broker);
    $response=[];

    if(!$resultSet){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
    } 
    else{
    $response['status']=1;
        while($row=$resultSet->fetch_object()){
            $response['kastinzi'][]=$row;
        }
    }
    echo json_encode($response);
}

?>