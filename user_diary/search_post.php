<?php
session_start();
$con=mysqli_connect("localhost","root","","userdiary");
if(!$_SESSION["username"]){
	
	header("location:login.php?log=Please First Login Love..");
}
$id=$_SESSION['user_id'];
$str=$_GET['char'];
$workspace_id=$_SESSION['workspace_id'];

$sql="SELECT * FROM `posts` WHERE `title` LIKE '$str%' AND `workspace_id`='$workspace_id'";
$query=mysqli_query($con,$sql);
if(mysqli_num_rows($query)>0){
while($res=mysqli_fetch_assoc($query)){
	$ans=$res['title'];
	echo "<a class='sear-res' href='search_post_result.php?res=$ans'>".$res['title']."</a>"."<hr>";
	}
}
else{
	echo "No match Found..";
	}
?>
