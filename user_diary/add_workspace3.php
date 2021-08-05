<?php
session_start();
include "connection.php";
if(!$_SESSION["username"]){
	
	header("location:login.php?log=Please First Login Love..");
}

$workspace_name=$_SESSION["wsp_name"];
$user_id=$_SESSION['user_id'];

$sql="SELECT * FROM `workspace_name` WHERE `workspace_name`='$workspace_name' AND `user_id`='$user_id'";
$query=mysqli_query($con,$sql);

if(mysqli_num_rows($query)>0){
	
	header("location:add_workspace.php?err=Workspace Already Exists...!");
	}
	else{
		$sql_insert="INSERT INTO `workspace_name`(`workspace_name`, `user_id`) VALUES ('$workspace_name','$user_id')";
		$query_insert=mysqli_query($con, $sql_insert);
		if($query_insert){
			
			$sql_sel="SELECT `workspace_id`, `workspace_name`, `user_id` FROM `workspace_name` WHERE `workspace_name`='$workspace_name' && 
			`user_id`='$user_id'";
			$query_sel=mysqli_query($con,$sql_sel);
			if($query_sel){
			while($row=mysqli_fetch_assoc($query_sel)){
				
				$workspace_id=$row['workspace_id'];
				
				}
				}
				else{
					echo "ERROR is:" .mysqli_error($con);
					}
				for($i=0;$i<$_SESSION["no_fields"];$i++){
					//$test=$_POST["field"][$i];
					$test=$_SESSION["field"][$i];
				$sql_ins="INSERT INTO `fields`(`user_id`,`workspace_id`, `field_name`) VALUES ('$user_id','$workspace_id','$test')";
				$query_ins=mysqli_query($con,$sql_ins);
			}
			header("location:home.php?msg=New Workspace have been created...!!");
		}
		
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