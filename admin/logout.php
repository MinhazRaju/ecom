<?php 

//$_SESSION['username'] = NULL;

session_start();
session_destroy();
header("Location:../index.php");	
	


 ?>