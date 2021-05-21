<?php
/**
 * Pagina del comercio para recibir la confirmación del pago
 * Flow notifica al comercio del pago efectuado
 */

require(__DIR__ . "/lib/FlowApi.class.php");

try {

    if(!isset($_POST["token"])) {
        throw new Exception("No se recibio el token", 1);
    }

    $token = filter_input(INPUT_POST, 'token');
    
    $params = array(
        "token" => $token
    );

    $serviceName = "costumer/getRegisterStatus";
    $flowApi = new FlowApi();
    $response = $flowApi->send($serviceName, $params, "GET");

    if(isset($response['cardToken'])){
        $_SESSION['cardToken'] = $response['cardToken'];
    }

    //Prepara url para redireccionar el browser del pagador
    $redirect = "https://membresia.lacavadelsommelier.cl/felicidades/";

    header("location:$redirect");
    
} catch (Exception $e) {

    echo "Error: " . $e->getCode() . " - " . $e->getMessage();
}

