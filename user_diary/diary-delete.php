<?php
include "connection.php";
if(!$_SESSION["username"]){
	
	header("location:login.php?log=Please First Login Love..");
}
$id=@$_GET['did'];
$del="DELETE FROM `daily_diary` WHERE `diary_id`='$id'";
$query=mysqli_query($con,$del);
if($query){
	header("location:daily_diary.php?ded=Diary is Deleted..");
}

?>