<?php
session_start();
include "connection.php";
if(!$_SESSION["username"]){
	
	header("location:login.php?log=Please First Login Love..");
}
$user_name=$_SESSION['username'];
$user_id=@$_SESSION['user_id'];
echo @$_GET['suc'];
echo @$_GET['ed'];
$res=@$_GET['res'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Diary</title>
<script src="script/jquery.js"></script>
<script src="script/jquery2.js"></script>

<script>
function start(){
	if(frm.msgqw.value==''){
		alert("You Should type something");
		return false;
		}
	var uname=frm.uname.value;
	var msgs=frm.msgqw.value;
	var xml=new XMLHttpRequest();
	xml.onreadystatechange=function(){
		if(xml.readyState==4 && xml.status==200){
			document.getElementById("messages").innerHTML=xml.responseText;
			}
		}
		xml.open("GET","insert_chat.php?name="+uname+"&message="+msgs,true);
		xml.send();
		
clear();
	}
	$(document).ready(function(e){
		$.ajaxSetup({cache:false});
		setInterval(function(){$("#messages").load("logs.php");},2000);
		});

</script>


<script>
function clear(){
	$('#form').children('input:not(#name,#ac)').val('');
	}
</script>

<script>
document.addEventListener("DOMContentLoaded",function(){
$('#chatt').keypress(function(e) {
  var key = e.which;
  if (key == 13) {
      $('#ac').click();
      return false;
  }
 });
 });

</script>


</head>

<body class="h-body">

<div class="home-header">
	<div class="main-header">
		
        <div class="logo-header">
    	<img src="images/logo3.png" /> 
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
                placeholder="Search here..." name="search" onkeyup="search(this.value)" />
            	               
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
					  window.location.href="search_result.php?res="+sear;
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

<div class="home-body">
	<div class="picture">
    <img src="images/user-logos.png"><b><a href=""><?php echo "HELLO"."  ".$user_name;?></a></b>
    </div>
    
    <div class="search">
        </div>
    <div class="clear"></div>
    
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
   <h2>List of Workspaces created by "<b><?php echo $user_name; ?>"</b></h2>
   </div>
   
   <div class="home">
   	<table class="home-table" method="POST">
   	<thead>
    <tr>
    <th>No.</th>
    <th>Workspace Name</th>
    <th>More Info</th>
    <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php 
	$sql="SELECT * FROM `workspace_name` WHERE `user_id`='$user_id' AND `workspace_name`='$res'";
	$query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($query);
	 $i=1;
	 if($count>0){
	 while($res=mysqli_fetch_assoc($query)){
	 //for($i=1;$i<=$count;$i++){
	 $id=$res['workspace_id'];
	 
	 ?>
    <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $res['workspace_name']; ?></td>
    <?php $i++; ?>
    <td><?php echo "<a href='view_posts.php?id=$id'>Details</a>"; ?></td>
    <td><?php echo "<a href='delcomp.php?wid=$id'>Delete Workspace</a>"; ?> /
    <?php echo "<a href='edit.php?wid=$id'>Edit</a>"; ?></td>
   
    
    <?php } }
	else{ ?>
		<td><?php echo "Sorry...There is no record to show.."; ?> </td>
	<?php	} ?>
    </tr>
    </tbody>
    </table>
   </div>
   
    
</div>

<div class="total-chat">
 <div class="head-chat"></div>
 <div class="top-chat">
	
    
	<div class="chat">
    
		<div id="messages">
    	<div class="left-load"><img src="images/load-logo.png"></div> <div class="right-load">Loading...</div>
   	 	</div>
    
		<div class="msg">
    	<form id="form" name="frm">
    	<input type="hidden" value="<?php echo $user_name; ?>" name="uname" id="name">
    	<input type="text" value="" name="msgqw" placeholder="Enter your message here" id="chatt"/>
    	<a href="#" onclick="start();" name="anchor" id="ac"> Send </a>
    	</form>
    	</div>

	
 </div>	
</div>

</body>
</html>