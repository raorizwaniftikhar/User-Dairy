<?php
session_start();
include "connection.php";
echo $workspace_id=$_SESSION['workspace_id']=@$_GET['id'];
echo $updated=@$_GET['upd'];
echo $user_id=@$_SESSION['user_id'];
echo @$_GET['suc'];
$wrokspace_name=$_SESSION['select_workspace'];

$sqli="SELECT * FROM `workspace_name` WHERE `workspace_name`='$wrokspace_name' AND `user_id`='$user_id';";
$que=mysqli_query($con,$sqli);
while($rows=mysqli_fetch_assoc($que)){
	$rows['workspace_id'];
	$workspace_id=$rows['workspace_id'];
	}
	
	
//echo @$_GET['del'];
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="home-header"></div>

<div class="home-body">
	<div class="picture">
    <img src="images/user-logos.png"><b><a href=""><?php echo "HELLO";?></a></b>
    </div>
    <div class="menu-home">
    	<div class="add-home">
    		<a href="add_workspace.php">
        	<div class="icon-home"><img src="images/add.png">
        	</div>   
        	<div class="link-home"><span class="add-span">Add Workspaces</span>
        	</div>
        	</a>
        	<div class="clear"></div>
     	</div>
    	<div class="insert-home">
    		<a href="insert_workspace_data.php">
        	<div class="icon-home"><img src="images/insert.png">
        	</div>   
        	<div class="link-home">Insert New Post In Workspace
        	</div>
        	</a>
        	<div class="clear"></div>
    	</div>
    
    	<div class="update-home">
    		<a href="">
        	<div class="icon-home"><img src="images/update.png">
        	</div>   
        	<div class="link-home">Update A Post
    		</div>
        	</a>
        	<div class="clear"></div>
    	</div>
		<div class="clear"></div>
	</div>
   
   
   <div class="para-home">
   <p><?php echo @$_GET['msg']; ?></p>
   <p><?php // echo @$_GET['del']?></p>
   <h2>List of Posts Added by <b>user</b> To Workspace</h2>
   </div>
   
   <div class="home">
   	<table class="home-table" method="POST">
   	<thead>
    <tr>
    <th>No.</th>
    <th>Post Title</th>
    <th>Update Post</th>
    
    </tr>
    </thead>
    <tbody>
    <?php 
	$sql="SELECT * FROM `posts` WHERE `workspace_id`='$workspace_id'";
	$query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($query);
	 $i=1;
	 if($count>0){
	 while($res=mysqli_fetch_assoc($query)){
	 //for($i=1;$i<=$count;$i++){
	 $tit=$res['title'];
	 $pid=$res['post_id'];
	 
	 ?>
    <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $tit; ?></td>
    <?php $i++; ?>
    <td><?php echo "<a href='update_workspace_3.php?id=$pid'>Update the post</a>"; ?></td>
   
    
    <?php } }
	else{ ?>
		<td><?php echo "Sorry...There is no record to show.."; ?> </td>
	<?php } ?>
    </tr>
    </tbody>
    </table>
   </div>
   
    
</div>
</body>
</html>