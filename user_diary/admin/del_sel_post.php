<?php
include "connection.php";
@$_GET['uid'];
$post_id=@$_GET['pid'];
$field_data_id=$_GET['fid'];
$select=$_GET['sel'];
if($select=='Filter'){
	header("location:all_posts.php?fil=Please select something from the filter to delete");}

if($select=='Post'){
	$dep="DELETE p,fd FROM `posts` AS p INNER JOIN `fields_data` AS fd ON p.post_id=fd.post_id WHERE p.post_id='$post_id'";
	$qep=mysqli_query($con,$dep);
	if($qep){
		header("location:all_posts.php?pdel=The Selected Post and its corresponding field data have been deleted");}
		else{
			echo mysqli_error($con);}

}

if($select=='Field data'){
	
$def="DELETE FROM `fields_data` WHERE `post_id`='$post_id' AND `field_data_id`='$field_data_id'";
$qef=mysqli_query($con,$def);
if($qef){
	header("location:all_posts.php?fdel=Fields Have Been Deleted!!!");}
else{
	echo mysqli_error($con);}
}


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>