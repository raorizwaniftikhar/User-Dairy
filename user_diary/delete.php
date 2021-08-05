<?php
include "connection.php";
if(!$_SESSION["username"]){
	
	header("location:login.php?log=Please First Login Love..");
}
$id=$_GET['wid'];

$sql="DELETE FROM `workspace_name` WHERE `workspace_id`='$id'";
$que=mysqli_query($con,$sql);
if($que){
	
	header("location:home.php?del=Your Workspace Have Been Deleted Successfully!!!");

	}
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>