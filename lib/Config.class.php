<?php
/**
 * Clase para Configurar el cliente
 * @Filename: Config.class.php
 * @version: 2.0
 * @Author: flow.cl
 * @Email: csepulveda@tuxpan.com
 * @Date: 28-04-2017 11:32
 * @Last Modified by: Carlos Sepulveda
 * @Last Modified time: 28-04-2017 11:32
 */
 
 $COMMERCE_CONFIG = array(
 	"APIKEY" => "6302A6F8-484C-4E52-A268-82AFD694LF78", // Registre aquí su apiKey
 	"SECRETKEY" => "91375e30b8c4dc33da79935d08a9358509a68ffa", // Registre aquí su secretKey
 	"APIURL" => "https://sandbox.flow.cl/api", //"https://www.flow.cl/api", // Producción EndPoint o Sandbox EndPoint
 	"BASEURL" => "http://testhome.local/apiFlow",  //Registre aquí la URL base en su página donde instalará el cliente
//
	"EMAIL_HOST"=>'mail.lacavadelsommelier.cl',
	"EMAIL_USER"=>"membresias@lacavadelsommelier.cl",
	"EMAIL_PASS"=>'wCIbM%EZt5',
	"EMAIL_DEFAULT"=>'intelecto83@gmail.com',
	"USER_FROM"=> "La cava"
 );
 
class Config {
 	
	static function get($name) {
		global $COMMERCE_CONFIG;
		if(!isset($COMMERCE_CONFIG[$name])) {
			throw new Exception("The configuration element thas not exist", 1);
		}
		return $COMMERCE_CONFIG[$name];
	}
 }


function required(string $texto): bool
{
	return !(trim($texto) == '');
}

/**
 * Método que valida si es un número entero
 * @param {string} - Número a validar
 * @return {bool}
 */
function integer(string $numero): bool
{
	return (filter_var($numero, FILTER_VALIDATE_INT) === FALSE) ? False : True;
}

/**
 * Método que valida si el texto tiene un formato válido de E-Mail
 * @param {string} - Email
 * @return {bool}
 */
function email(string $texto): bool
{
	return (filter_var($texto, FILTER_VALIDATE_EMAIL) === FALSE) ? False : True;
}


function validation($value,$valid)
{

	foreach($value as $v1 =>$v2){

		if(key_exists($v1,$valid)){

			if(!$valid[$v1]($v2)){

				return false;
			}
		}
	}

	return true;
}

