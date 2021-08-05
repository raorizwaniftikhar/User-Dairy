<?php
session_start();
if(!$_SESSION["username"]){
	
	header("location:login.php?log=Please First Login Love..");
}
$con=mysqli_connect("localhost","root","","userdiary");
$id=$_SESSION['user_id'];
$str=$_GET['char'];

$sql="SELECT * FROM `workspace_name` WHERE `workspace_name` LIKE '$str%' AND `user_id`='$id'";
$query=mysqli_query($con,$sql);
if(mysqli_num_rows($query)>0){
while($res=mysqli_fetch_assoc($query)){
	$ans=$res['workspace_name'];
	echo "<a class='sear-res' href='search_workspace.php?res=$ans'>".$res['workspace_name']."</a>"."<hr>";
	}
}
else{
	echo "No match Found..";
	}
?>
