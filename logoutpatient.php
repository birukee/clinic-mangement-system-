<?php
session_start();

//set login attempt 
$con= new mysqli("localhost","root","","mk_clinic");
 if($con->connect_error):
	  die("failed".$con->connect.error);
 endif;


$_SESSION["patient_login"]= false;
unset($_SESSION['patient_username']);
unset($_SESSION['patient_id']);
unset($_SESSION['patient_department']);
unset($_SESSION['patient_fname']);
unset($_SESSION['patient_lname']);
unset($_SESSION["patient_picture"]);
unset($_SESSION["patient_campus"]);


header("Location:PATIENT/index.php", true, 301);
exit();
?>