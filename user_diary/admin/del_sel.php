<?php
include "connection.php";
$select=$_GET['sel'];
$user_id=$_GET['uid'];
$workspace_id=$_GET['wid'];
$field_id=$_GET['fid'];

if($select=='Filter'){
	header("location:all_workspaces.php?fil=Please select something from the filter to delete");}
	
	if($select=='User'){
		//$del="DELETE `login`,`workspace_name`,`fields`,`posts`,`fields_data` FROM `login` INNER JOIN `workspace_name` INNER JOIN `fields` INNER JOIN
 //`posts` INNER JOIN `fields_data` ON login.user_id=workspace_name.user_id AND login.user_id=fields.user_id AND posts.user_id=fields_data.user_id
  //WHERE login.user_id= '$user_id'";

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
		if($dew && $def && $dep && $defd){
		header("location:all_workspaces.php?udel=The user and its corresponding workspaces have been deleted!!");
		    }
	}
	else{
		echo"Its not done man..".mysqli_error($con);
		}
	}
	
	if($select=='Workspace'){
		$sel="SELECT * FROM `posts` WHERE `workspace_id`='$workspace_id'";
		$qus=mysqli_query($con,$sel);
		$counter=mysqli_num_rows($qus);
		if($qus){
		$pids=array();
		while($res=mysqli_fetch_assoc($qus)){
			$res['post_id'];
			$pids[]=$res['post_id'];
		}
		}
		else{
			echo mysqli_error($con);
		}
		

		
	$dew="DELETE wn,f FROM `workspace_name` AS wn INNER JOIN `fields` AS f ON wn.workspace_id=f.workspace_id
	 WHERE wn.workspace_id='$workspace_id'";
	 $query=mysqli_query($con,$dew);
	 if($query){
	 for($i=0;$i<$counter;$i++){
	 $dep="DELETE p,fd FROM `posts` AS p INNER JOIN `fields_data` AS fd ON p.post_id=fd.post_id WHERE p.post_id='$pids[$i]'";
	$quer=mysqli_query($con,$dep);
	if($quer){
	header("location:all_workspaces.php?wdel=All Workspaces and its corresponding fields and data is deleted");
	}
	else{
		echo mysqli_error($con);
	}
	}
	 }
	 else{
		 echo "ERROR IN Workspace or fields" . mysqli_error($con);
	 }
	}

	
	if($select=='Field'){
	$del="DELETE f,fd FROM `fields` AS f INNER JOIN `fields_data` AS fd ON f.field_id=fd.field_id WHERE f.field_id='$field_id' ";
	$que=mysqli_query($con,$del);
	if($que){
		header("location:all_workspaces.php?fd=Selected Field and its Coressponding data has been deleted!!");
		}
		else{
			echo mysqli_error($con);}
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="script/jquery.js"></script>

</head>

<body>
</body>
</html>