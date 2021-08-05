<?php
session_start();
include "connection.php";
if(!$_SESSION["username"]){
	
	header("location:login.php?log=Please First Login Love..");
}
$workspace_id=$_SESSION['workspace_id']=@$_GET['id'];
$user_id=@$_SESSION['user_id'];
echo @$_GET['suc'];
$user_name=$_SESSION['username'];
//echo @$_GET['del'];
$new=$_SESSION["w_id"];
$res=@$_GET['res'];
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                placeholder="Search Posts..." name="search" onkeyup="search(this.value)" />
            	               
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
					  window.location.href="search_post_result.php?res="+sear;
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
        <a href="home.php"><li class="home-menu">Home</li></a>
        <a href="daily_diary.php"><li class="daily">Daily Diary</li></a>
        <a href="view_posts.php"><li class="post">Posts</li></a>
        <a href="contact.php"><li class="cont">Contact Us</li></a>
        <a href="logout.php"><li class="about">Logout</li></a>
        <div class="clear"></div>
        </ul>
        </div>
    </div>
</div>


<div class="home-body">
	
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
    <th>Details</th>
    <th>Delete Post</th>
    </tr>
    </thead>
    <tbody>
    <?php 
	$sql="SELECT * FROM `posts` WHERE `workspace_id`='$new' AND `title`='$res'";
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
    <td><?php echo "<a href='view_posts_data.php?pid=$pid'>View Post Data</a>"; ?></td>
    <td><?php echo "<a href='delete_post.php?pid=$pid'>Delete Post</a>"; ?></td>
   
    
    <?php } }
	else{ ?>
		<td><?php echo "Sorry...There is no record to show.."; ?> </td>
	<?php } ?>
    </tr>
    </tbody>
    </table>
   </div>
   
    
</div>


<div class="total-chat">
	<div class="head-chat">
        <span class="chat-username"><?php echo $user_name;?></span><span class="close"><img src="images/cross.png"></span>
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