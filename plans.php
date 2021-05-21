<?php
session_start();

require(__DIR__ . "/lib/FlowApi.class.php");

/* Afiliar al plan */

$serverName = "subscription/create";

$params = array("planId" => $_SESSION['planId'],
                "customerId" =>$_SESSION['customerId'],
                "subscription_start" => date('Y-m-d'),
                "periods_number" => null);

try{

    $flowApi = new FlowApi();
    $response = $flowApi->send($serverName,$params,"POST");

    //Prepara url para redireccionar el browser del pagador
    $redirect = "https://membresia.lacavadelsommelier.cl/felicidades/";

    header("location:$redirect");

}catch (Exception $e){
    echo $e->getCode() . " - " . $e->getMessage();
}

