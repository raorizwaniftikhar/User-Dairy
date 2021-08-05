<?php
session_start();
include "connection.php";
$user=$_SESSION['admin_name'];
$user_id=@$_SESSION['user_id'];
echo @$_GET['suc'];
echo @$_GET['udel'];
$name=@$_GET["res"];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="script/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="home-header"></div>

<div class="home-body">
	<div class="upper-menu">
    	<div class="picture">
    	<img src="images/user-logos.png"><b><a href=""><?php echo "HELLO".$user;?></a></b>
    	</div>
    	<div class="search">
    		<div class="search-bar">
        		<div class="search-img">
            	<img src="images/search.png">
            	</div>
            	<div class="search-input">
                
           		<input id="sear" autocomplete="off" type="text" placeholder="Search here..." name="search" onkeyup="search(this.value)" />
            	               
                </div>
                
            	<div class="clear"></div>
                <div id="anchor">
                
                <button id="btnss" onclick="test()">Click</button>
                </div>
                <div id="list"></div>
                <script>
					function search(str){
					if(str.length ==0){
					document.getElementById("list").innerHTML="Please Enter Something";
					return;}
					xml=new XMLHttpRequest();
					xml.onreadystatechange=function(){
					if(xml.readyState==4 && xml.status==200){
					document.getElementById("list").innerHTML=xml.responseText;}
					}
	
					xml.open("GET","search.php?char="+str,true);
					xml.send();
					}
					</script>
                    
                   <script>
				   function test(){
					   var sear;
					   sear=document.getElementById("sear").value;
					  window.location.href="test.php?res="+sear;
					   }
				   </script> 
                   <script type="text/javascript">
				   document.addEventListener("DOMContentLoaded",function(){
					   $("#sear").keypress(function(e){
						   
						   if(e.which == 13){
							   $("#btnss").click();
							   return false;
							   }
						   
						   });
					   
					   });
				   </script>
        	</div>
    	</div>
    	<div class="clear"></div>
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
    		<a href="update_workspace.php">
        	<div class="icon-home"><img src="images/update.png">
        	</div>   
        	<div class="link-home">Update A Post
    		</div>
        	</a>
        	<div class="clear"></div>
    	</div>
        
        <div class="daily-home">
    		<a href="insert_workspace_data.php">
        	<div class="icon-home"><img src="images/insert.png">
        	</div>   
        	<div class="link-home">Daily Diary
        	</div>
        	</a>
        	<div class="clear"></div>
    	</div>
		<div class="clear"></div>
	</div>
   
   
   <div class="para-home">
   <p><?php echo @$_GET['msg']; ?></p>
   <p><?php echo @$_GET['del']?></p>
   <h2>List of All the Users</b></h2>
   </div>
   
   <div class="home">
   	<table class="home-table" method="POST">
   	<thead>
    <tr>
    <th>No.</th>
    <th>UserName</th>
    <th>More Info</th>
    <th>Delete User</th>
    </tr>
    </thead>
    <tbody>
    <?php 
	$sql="SELECT * FROM `login` WHERE `user_name`='$name'";
	$query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($query);
	 $i=1;
	 if($count>0){
	 while($res=mysqli_fetch_assoc($query)){
	 //for($i=1;$i<=$count;$i++){
	 $id=$res['user_id'];
	 $res['user_name'];
	 
	 ?>
    <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $res['user_name']; ?></td>
    <?php $i++; ?>
    <td><?php echo "<a href='view_workspaces.php?id=$id'>Details</a>"; ?></td>
    <td><?php echo "<a href='deluser.php?uid=$id'>Delete</a>"; ?></td>
   
    
    <?php } }
	else{ ?>
		<td><?php echo "Sorry...There is no user to show.."; ?> </td>
	<?php	} ?>
    </tr>
    </tbody>
    </table>
   </div>
   
    
</div>


</body>
</html>