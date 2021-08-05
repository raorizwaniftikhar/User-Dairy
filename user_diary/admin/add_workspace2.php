<?php
session_start();
if(!$_SESSION['admin_name']){
	header ("location:login.php?log=Please First Login");
	}
$_SESSION["wsp_name"];
$_SESSION["no_fields"];


if(isset($_POST['sub'])){

$_SESSION["field"]=$_POST["field"];

//	for($i=0;$i<$_SESSION["no_fields"];$i++){
//	$_SESSION["field"]=$_POST["field"][$i]."<br>";
	
//	}
//$test='';
//foreach($field as $var){
//	$test.=$var;
//	}
header("location:add_workspace3.php");
	}
//session_unset();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="test-add2">
<form method="POST" action="">
<?php

for($i=1;$i<=$_SESSION["no_fields"];$i++){

?>
Enter Name of Fields:<input type="text" name="field[]"><br><br>

<?php } ?>
<br>
<input type="submit" name="sub" value="Submit">
</form>

</div>
</body>
</html>