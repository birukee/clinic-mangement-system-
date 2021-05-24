<?php
session_start();

//set login attempt 
$con= new mysqli("localhost","root","","mk_clinic");
 if($con->connect_error):
	  die("failed".$con->connect.error);
 endif;
$username=$_SESSION["username"];
//update online to offline when log out 

$query="UPDATE staffs_profile SET online_state ='0' WHERE user_name='$username' ";//change online state to offline 
if($con->query($query)==TRUE):endif;

$_SESSION["login"]= false;
unset($_SESSION['username']);
unset($_SESSION['id']);
unset($_SESSION['department']);
unset($_SESSION['fname']);
unset($_SESSION['lname']);
unset($_SESSION["picture"]);
unset($_SESSION["campus"]);


header("Location:index/index.php", true, 301);
exit();
?>