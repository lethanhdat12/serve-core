<?php
require_once("../wp-config.php");
require_once("./ResponseInterface/ResponseClass.php");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');



$request =  $_SERVER["REQUEST_URI"];
$components = parse_url($request, PHP_URL_QUERY);
parse_str($components, $results);
var_dump( $results);
