<?php

require __DIR__ . "/lib/FlowApi.class.php";
require './sendform.php';



/* Create Customer */

$params = ["name"=>$_POST['name'],
		   "email"=>$_POST['email'],
	       "externalId"=>$_POST['externalId'],
		   "direccion"=>$_POST['direccion']
		  ];

/* Validation */

$validation = ['name'=>'required',
			   'email'=>'required',
			   'direccion'=>'required',
			   'externalId'=>'required'];

if(!validation($params,$validation)){

	return header('Location:' . getenv('HTTP_REFERER'));
}

$serviceName = "customer/create";

$error = null;

try {

	try{
		sendEmail($params);

	}catch (Exception $e){

		$error = $e->getMessage();
	}

	$flowApi = new FlowApi();
	$response = $flowApi->send($serviceName, $params,"POST");

	/* Suscriptions a Plans */

	$serverNamePlan = "subscription/create";

	$paramsPlan = array("planId" => $_POST['planId'],
		"customerId" => $response['customerId'],
		"subscription_start" => date('Y-m-d'),
		"periods_number" => null);

	$flowApiPlan = new FlowApi();
	$responsePlan = $flowApiPlan->send($serverNamePlan,$paramsPlan,"POST");

	/* Customer Register */

	$paramsReg = array("customerId" =>$response["customerId"],
					   "url_return"=> Config::get("BASEURL").'/confirmRegister.php');

	$serviceNameReg = "customer/register";

	$flowApiReg = new FlowApi();

	$responseReg = $flowApiReg->send($serviceNameReg,$paramsReg,"POST");

	/* Redirection Browser Paymen */

	$redirect = $responseReg['url'] ."?token=" .$responseReg['token'];
	header("location:$redirect");

} catch (Exception $e) {
	echo $e->getCode() . " - " . $e->getMessage();
}