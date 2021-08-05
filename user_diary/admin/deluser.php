<?php 
include "connection.php";
echo $user_id=@$_GET['uid'];




//$del="DELETE `login`,`workspace_name`,`fields`,`posts`,`fields_data` FROM `login` INNER JOIN `workspace_name` INNER JOIN `fields` INNER JOIN
 //`posts` INNER JOIN `fields_data` ON login.user_id=workspace_name.user_id AND login.user_id=fields.user_id AND login.user_id=fields_data.user_id
 // WHERE login.user_id= '$user_id'";
 
 //$del="DELETE l,wn,f,p,fd FROM `login` as l 
 //INNER JOIN `workspace_name` as wn 
 //ON l.user_id=wn.user_id 
 //INNER JOIN `fields` as f 
 //ON l.user_id=f.user_id 
 //INNER JOIN `posts` as p 
 //ON l.user_id=p.user_id
 //INNER JOIN `fields_data` as fd 
 //ON l.user_id=fd.user_id WHERE l.user_id='$user_id'";
 $del="DELETE FROM `login` WHERE `user_id`='$user_id'";
$query=mysqli_query($con,$del);
if($query){
	
	$dew="DELETE FROM `workspace_name` WHERE `user_id`='$user_id'";
	$quew=mysqli_query($con,$dew);
	$def="DELETE FROM `fields` WHERE `user_id`='$user_id'";
	$quef=mysqli_query($con,$def);
	$dep="DELETE FROM `posts` WHERE `user_id`='$user_id'";
	$quep=mysqli_query($con,$dep);
	$defd="DELETE FROM `fields_data` WHERE `user_id`='$user_id'";
	$quefd=mysqli_query($con,$defd);
	$dedd="DELETE FROM `daily_diary` WHERE `user_id`='$user_id'";
	$quedd=mysqli_query($con,$dedd);
		if($dew && $def && $dep && $defd && $quedd){
		header("location:view_user.php?udel=The user and its corresponding workspaces have been deleted!!");
		    }
	}
	else{
		echo"Its not done man..".mysqli_error($con);
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