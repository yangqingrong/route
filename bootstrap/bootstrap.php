<?php

ini_set("display_errors",true);
error_reporting(E_ALL|E_ERROR); 
 
//session_start();
//date_default_timezone_set("Asia/shanghai");

define('BASE_PATH',dirname(__DIR__));
require_once(__DIR__.'/autoload.php');

 




 
require_once(BASE_PATH. '/app/common/functions/helpers.php');

$path =$_SERVER['REQUEST_URI'];  // use request_uri as router path,can be use $_GET,string,and so on
//print_r( $s );

$r =include (BASE_PATH ."/routes/web.php");
$r->start($path );
?>