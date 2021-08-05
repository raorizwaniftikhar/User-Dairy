<?php
$con=mysqli_connect("localhost","root","","userdiary");
$str=$_GET['char'];

$sql="SELECT * FROM `login` WHERE `user_id` LIKE '$str%' OR `user_name` LIKE '$str%'";
$query=mysqli_query($con,$sql);
if(mysqli_num_rows($query)>0){
while($res=mysqli_fetch_assoc($query)){
	$ans=$res['user_name'];
	echo "<a class='sear-res' href='search_result2.php?res=$ans'>".$res['user_name']."</a>"."<hr>";
	}
}
else{
	echo "No match Found..";
	}
?>
