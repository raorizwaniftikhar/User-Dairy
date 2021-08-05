<?php
session_start();
include "connection.php";

if(!$_SESSION['admin_name']){
	header ("location:login.php?log=Please First Login");
	}
	else{
	
echo @$_GET['fil'];
echo @$_GET['udel'];
echo @$_GET['wdel'];
	echo @$_GET['fd'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="script/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="h-body">
<div class="home-header">
	<div class="main-header">
		
        <div class="logo-header">
    	<img src="images/final-logo.png" /> 
    	</div>
        
        <div class="logo-slogan">
        <p>Some Slogan here</p>
        </div>
        
        <div class="logo-search">
        	<div class="search">
    		<div class="search-bar">
        		<div class="search-img">
            	<img src="images/search.png">
            	</div>
            	<div class="search-input">
                
           		<input id="sear" autocomplete="off" type="text" 
                placeholder="Search Workspaces..." name="search" onkeyup="search(this.value)" />
            	               
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
					  window.location.href="search_workspace.php?res="+sear;
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

        </div>
        
        <div class="clear"></div>
     </div>   


</div>
<div class="menu-main">
	<div class="menu-list">
    	<div class="list">
        <ul>
         <a href="view_user.php"><li class="home-menu">Home</li></a>
        <a href="all_posts.php"><li class="daily">Posts</li></a>
        <a href="all_workspaces.php"><li class="post">Workspaces</li></a>
        <a href="logout.php"><li class="about">Logout</li></a>
        <div class="clear"></div>
        </ul>
        </div>
    </div>
</div>
<div class="home-body">
 <div class="home">
	<table class="home-table" method="POST">
   	<thead>
    <tr>
    <th>User Id</th>
    <th>User Name</th>
    <th>Email</th>
    <th>Workspace Name</th>
    <th>Fields of workspaces</th>
    <th>Action</th>
    <!--<th colspan="2">Actions</th>-->
    
    </tr>
    </thead>
    <tbody>
    <?php
    $sqli="SELECT login.user_id,login.user_name,login.email,workspace_name.workspace_id, workspace_name.workspace_name,fields.field_id,fields.field_name FROM `login` INNER JOIN
	 `workspace_name` INNER JOIN `fields` 
ON login.user_id= workspace_name.user_id AND workspace_name.workspace_id= fields.workspace_id
 ";
 $que=mysqli_query($con,$sqli);
 while($res=mysqli_fetch_assoc($que)){
	 $user=$res['user_name'];
	 $email=$res['email'];
	 $workspace=$res['workspace_name'];
	 $field=$res['field_name'];
	 $user_id=$res['user_id'];
	 $field_id=$res['field_id'];
	 $workspace_id=$res['workspace_id'];
	?>
   
    <tr>
    <td><?php echo $user_id; ?></td>
    <td><?php echo $user; ?></td>
    <td><?php echo $email; ?></td>
    <td><?php echo $workspace; ?></td>
    <td><?php echo $field; ?></td>
    <td><?php echo "<form method='GET' action='del_sel.php'> <select class='all-sel' name='sel'><option value='Filter'>Filter</option><option value='User'>User</option><option value='Workspace'>Workspace</option><option value='Field'>Field</option></select>
	<input type='hidden' name='uid' value='$user_id'>
	<input type='hidden' name='wid' value='$workspace_id'>
	<input type='hidden' name='fid' value='$field_id'>
	<input class='btn-allworkspace' type='submit' name='sub' value='DELETE'> </form>";?>
    </td>
    
    </tr>
    <?php } ?>
    
    </tbody>
 </table>
 <div id="print-button" onclick="javascript:window.print()" >
			<div id="print-pic">
			<img src="images/print.png">
			</div>
			
			<div id="print-btn">
			<button>Print</button>
			</div>
			<div class="clear">
			</div>
			
		</div>

 </div>
</div> 
<div class="footer">
<p>All Rights Reserved by Sheikh Mashhood Ali</p>

</div>
</body>
</html>
