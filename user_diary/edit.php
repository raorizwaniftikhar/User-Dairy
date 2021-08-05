<?php
session_start();
include "connection.php";
if(!$_SESSION["username"]){
	
	header("location:login.php?log=Please First Login Love..");
}
$user_name=$_SESSION['username'];
echo $workspace_id=$_GET['wid'];
$sel="SELECT * FROM `workspace_name` WHERE `workspace_id`='$workspace_id'";
$query=mysqli_query($con,$sel);
while($res=mysqli_fetch_assoc($query)){
	$name=$res['workspace_name'];
	
}
if(isset($_POST['btn'])){
	$workspace_name=$_POST['w_name'];
$upd="UPDATE `workspace_name` SET `workspace_name`='$workspace_name' WHERE `workspace_id`='$workspace_id'";
$que=mysqli_query($con,$upd);
if($upd){
	header("location:home.php?ed=Workspace have been Updated..");
	}
	else{
		echo "Not Ok";
		}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Untitled Document</title>
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
        <a href="#"><li class="home-menu">Home</li></a>
        <a href="#"><li class="daily">Daily Diary</li></a>
        <a href="#"><li class="post">Posts</li></a>
        <a href="#"><li class="cont">Contact Us</li></a>
        <a href="#"><li class="about">About</li></a>
        <div class="clear"></div>
        </ul>
        </div>
    </div>
</div>
<div class="edit-pg">
<form class="form-add" action="" method="POST">
<label>Edit Workspace Name:</label><input type="text" name="w_name" value="<?php echo $name;?>">
<br><input type="submit" name="btn">
</form>
</div>
<div class="total-chat">
	<div class="head-chat">
    <span><?php echo $user_name;?></span>
    </div>
 
	
    
	<div class="chat">
    
		<div id="messages">
    	<div class="left-load"><img src="images/load-logo.png"></div> <div class="right-load">Loading...</div>
   	 	</div>
    </div>
		<div class="msg">
    	<form id="form" name="frm">
    	<input type="hidden" value="<?php echo $user_name; ?>" name="uname" id="name">
    	<input type="text" value="" name="msgqw" placeholder="Enter your message here" id="chatt"/>
    	<a href="#" onclick="start();" name="anchor" id="ac"> Send </a>
    	</form>
    	</div>
 
	
 
 </div>

<div class="footer">
<p>All Rights Reserved by Sheikh Mashhood Ali</p>

</div>

</body>
</html>