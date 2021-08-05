<?php
session_start();
include "connection.php";
if(!$_SESSION['admin_name']){
	header ("location:login.php?log=Please First Login");
	}
echo @$_GET['fil'];
echo @$_GET['pdel'];
echo @$_GET['fdel'];
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
<td>User_Id</td>
<td>User Name</td>
<td>Post Title</td>
<td>Field Data</td>
<td>Action</td>
</tr>
</thead>
<tbody>
<?php
$sel="select l.user_id,l.user_name,wn.workspace_name,p.post_id,p.title,fd.field_data,fd.field_data_id from `login` AS l inner join `workspace_name` AS wn inner join `posts` as p 
inner join `fields_data` as fd on l.user_id=wn.user_id and wn.workspace_id=p.workspace_id and p.post_id=fd.post_id
";
$query=mysqli_query($con,$sel);
while($row=mysqli_fetch_assoc($query)){
	$user_id=$row['user_id'];
	$user_name=$row['user_name'];
	$workspace_name=$row['workspace_name'];
	$post_id=$row['post_id'];
	$title=$row['title'];
	$field_data=$row['field_data'];
	$field_data_id=$row['field_data_id'];
	
	

?>
<tr>

<td><?php echo $user_id;?></td>
<td><?php echo $user_name;?></td>
<td><?php echo $title;?></td>
<td><?php echo $field_data;?></td>

<td>
<?php 
echo "<form action='del_sel_post.php' method='GET'>
<select name='sel'><option value='Filter'>Filter</option><option value='Post'>Post</option><option value='Field data'>Field data</option></select>
<input type='hidden' name='uid' value='$user_id'>
<input type='hidden' name='pid' value='$post_id'>
<input type='hidden' name='fid' value='$field_data_id'>
<input type='submit' name='btnsub' value='Delete'>
</form>"; 
?>
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