<?php
include "connection.php";
$workspace_id=@$_GET['wid'];

$sql_post="SELECT * FROM `posts` WHERE `workspace_id`= '$workspace_id'";
$query_post=mysqli_query($con,$sql_post);

 while($res=mysqli_fetch_assoc($query_post)){
	$post_id=$res['post_id'];
	}

$sql="DELETE `wn`, `f`, `p`, `fd` FROM `workspace_name` AS `wn` INNER JOIN `fields` AS `f` INNER JOIN `posts` AS `p` INNER JOIN `fields_data` AS `fd` ON wn.workspace_id= f.workspace_id
AND wn.workspace_id= p.workspace_id AND p.post_id= fd.post_id WHERE wn.workspace_id='$workspace_id' AND 
p.post_id='$post_id'";
$que=mysqli_query($con,$sql);
if($que){
	header("location:home.php?del=The Workspace and its coressponding posts have been deleted!!!");
	}
	else{
		echo "ERROR:".mysqli_error($con);
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