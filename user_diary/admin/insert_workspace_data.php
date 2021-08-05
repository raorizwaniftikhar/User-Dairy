<?php 
session_start();
include "connection.php";
$user_id=@$_SESSION['user_id'];
if(isset($_POST['button'])){
	$sel_workspace=$_POST['select_workspace'];
	if(empty($sel_workspace)){
		echo "Please select a workspace";
		}
		else{
			$_SESSION['select_workspace']=$sel_workspace;
			header("location:insert_workspace_data2.php");
			}
	
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
<div class="home-body">
	<div class='insert-label'>
    <form class="" action="" method="POST">
<label>Select the workspace in which you want to insert data</label>
	</div>
	
    <div class="insert-select">
    <select name="select_workspace">
    <option disable>Select:</option>
    <?php 
	$sql="SELECT `workspace_name` FROM `workspace_name` WHERE `user_id`='$user_id'";
	$que=mysqli_query($con,$sql);
	while($res=mysqli_fetch_assoc($que)){
	?>
    <option><?php echo $res['workspace_name']; ?> </option>
    <?php } ?>
    </select>
    <input type="submit" value="SUBMIT" name="button">
    </div>
    </div>
</div>
</body>
</html>