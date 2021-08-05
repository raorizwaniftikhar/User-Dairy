<?php
session_start();
include "connection.php";
if(!$_SESSION['admin_name']){
	header ("location:login.php?log=Please First Login");
	}
$_SESSION["wsp_name"]='';
$_SESSION["no_fields"]='';


if(isset($_POST['btn'])){
	
 $workspace_name=$_POST['wsp_name'];
 $fields=$_POST['no_fields'];


$_SESSION["wsp_name"]=$workspace_name;
 $_SESSION["no_fields"]=$fields;

header("location:add_workspace2.php");

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="test-main">
<form class="test-form-add" method="POST" action="">
Name:<br><input type="text" name="wsp_name" placeholder="Name of workspace">
<br>
No. of fields:<br>
<select name="no_fields">
<option>Select:</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
</select>
<br>
<input type="submit" name="btn" value="Submit">
</form>
</div>
</body>
</html>