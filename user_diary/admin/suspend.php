<?php
include "connection.php";
$user_id=$_GET["uid"];
//$date=date("ljS,F,Y")."<br>";
//$date=date("ljS,F,Y",strtotime("+2 days"))."<br>";

$date2=date("d-m-Y");
$expiration_date=date('d-m-Y', strtotime('+7 days'));


$sqli="SELECT * FROM `login` WHERE `user_id`='$user_id'";
$query=mysqli_query($con,$sqli);
while($res=mysqli_fetch_assoc($query)){
	$name=$res["user_name"];
	}


$sql="INSERT INTO `suspend`(`user_id`, `username`,`suspended_date`,`expiration_date`) VALUES ('$user_id','$name','$date2','$expiration_date')";
$que=mysqli_query($con,$sql);
if($que){
header("location:view_user.php?sus=User Has Been Suspended!!!");
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