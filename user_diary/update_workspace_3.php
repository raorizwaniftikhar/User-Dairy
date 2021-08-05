<?php
session_start();
include "connection.php";
if(!$_SESSION["username"]){
	
	header("location:login.php?log=Please First Login Love..");
}
$user_name=$_SESSION["username"];
$select_workspace=$_SESSION['select_workspace'];
echo @$_GET['err'];
  $post_id=$_GET['id'];
  $post_id;
  
  
  $sqlk="SELECT * FROM `posts` WHERE `post_id`='$post_id'";
  $quer=mysqli_query($con,$sqlk);
  while($ter=mysqli_fetch_assoc($quer)){
	 $title=$ter['title'];
	 $workspace_id=$ter['workspace_id'];
	  }
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/style.css">

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
<div class="header">
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
	<div class="fields">
    <form class="form-add" method="POST" action="">
      	<div class="top-field">
    	<label>Enter POST Name:</label> <input type="text" name="post_name" value="<?php echo $title; ?>">
    	</div>
    
    		<div class="low-field">
    		<?php
    
            
	
	
	       $sel="SELECT * FROM `fields_data` WHERE `post_id`='$post_id'";
		   $que=mysqli_query($con,$sel);
		   $count=mysqli_num_rows($que);
		   $data=array();
		   while($rar=mysqli_fetch_assoc($que)){
			 $field_name=$rar['field_data'];
			 $data[]=$rar['field_data'];
			 
			 }
		   
			 ?>
             <table class="update-table">
             <thead>
             <tr>
             <th class="upd-th">Name</th>
             <th class="upd-th2">Value</th>
             </tr>
             </thead>
             <tbody>
             <?php
             $sqw="SELECT * FROM `fields` WHERE `workspace_id`='$workspace_id'";
			 $wer=mysqli_query($con,$sqw);
			 $f_name=array();
			 $field_id=array();
			
			while($res=mysqli_fetch_assoc($wer)){
			$f_name[]=$res['field_name'];
			$field_id[]=$res['field_id'];	
			 }
			 for($i=0;$i<$count;$i++)
			 {
			 ?>
             <tr>
             <td class="upd-td"><?php  echo $f_name[$i]; ?> </td>
             <?php  
			 
			 
			  ?>
             <td class="upd-td"><input type="text" name="fields[]" value="<?php echo $data[$i];?>"></td>
             <?php } ?>
             </tr>
             </tbody>
             
             </table>
             
             <input type="submit" name="btnn" value="Update">
             <div class="clear"></div>
             </form>
             </div>
             
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

<?php
if(isset($_POST['btnn'])){
	$fields=$_POST['fields'];
	$title;
	$post_title=$_POST['post_name'];
	for($i=0;$i<$count;$i++){
	$sqf="Update `posts` inner join `fields_data` on posts.post_id= fields_data.post_id set `title`='$post_title',`field_data`= '$fields[$i]' WHERE posts.post_id='$post_id' AND `field_id`='$field_id[$i]'";
	$ques=mysqli_query($con,$sqf);
	if($sqf){
		//header("location:update_workspace_2.php?upd=The post have been updated successfully..");
		echo "<script>window.open('update_workspace_2.php?upd=The post have been updated successfully..','_self')</script>";
		}
		else{
			echo "ERROR";
			}
	}
}
?>


			