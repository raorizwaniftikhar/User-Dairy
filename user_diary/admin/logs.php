<?php
$con=mysqli_connect("localhost","root","","userdiary");
$sel="SELECT * FROM `chat` ORDER BY `id` DESC";
$que=mysqli_query($con,$sel);
while($res=mysqli_fetch_assoc($que)){
	echo "<span class='user-name'> <b><u>".$res['name']."</u></b></span>:". "<span class='messages'>".$res['message']."</span><br>";
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