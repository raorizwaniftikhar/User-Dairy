<?php
include "connection.php";

$id=@$_GET['pid'];

$ssq="DELETE `p`,`fd` FROM `posts` AS `p` INNER JOIN `fields_data` AS `fd` ON p.post_id = fd.post_id WHERE p.post_id= '$id'";
$query=mysqli_query($con,$ssq);
if($query){
	header("location:home.php?del=The post has been deleted successfully");
	}
else{
	echo "ERROR:".mysqli_error($con);
	}

?>