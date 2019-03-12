<?php 

ob_start();
session_start();
require_once("function.php");

defined("DS") ? null : define("DS" , DIRECTORY_SEPARATOR);

//DIRECTORY_SEPARATOR is a libary funciton and its prvide to system backslash or forward slash like (///// \\\\\\ )and its deifr to DS constant



defined("TEMPLATE_FONT") ? null : define("TEMPLATE_FONT", __DIR__.DS."template".DS."font");
defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__.DS."template".DS."back" );

// Magic constant __DIR__ root to folder 
// Magic constant __FILE__ root to folder and file 
//echo TEMPLATE_BACK; //C:\xampp\htdocs\ecom\resources\template\back provide root diretory

defined("DB_HOST") ? null : define("DB_HOST","localhost"); defined("DB_USER") ? null : define("DB_USER","id8907756_raju"); defined("DB_PASS") ? null : define("DB_PASS", "123321"); defined("DB_NAME") ? null : define("DB_NAME","id8907756_ecom_db");

	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	if($con){
		echo "";
	}

 




 ?>