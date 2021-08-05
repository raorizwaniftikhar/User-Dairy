<?php
include "connection.php";
echo $id=$_GET["uid"];
$del="DELETE FROM `suspend` WHERE `user_id`='$id'";
$que=mysqli_query($con,$del);
if($que){
	header("location:view_user.php?un=The user has been unsuspended!!!");}

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