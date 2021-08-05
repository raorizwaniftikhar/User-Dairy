<?php
session_start();
include "connection.php";
if(!$_SESSION["username"]){
	
	header("location:login.php?log=Please First Login Love..");
}
$user_name=$_SESSION['username'];
$select_workspace=$_SESSION['select_workspace'];
echo @$_GET['err'];
  
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
    	<label>Enter Post Name: </label> <input type="text" name="post_name" placeholder="Enter Post name">
    	</div>
    
    		<div class="low-field">
    		<?php
    
            $sqli="SELECT * FROM `workspace_name` WHERE `workspace_name`='$select_workspace'";
			$query=mysqli_query($con,$sqli);
			if($query){
			while($res=mysqli_fetch_assoc($query)){
				$workspace_id=$res['workspace_id']."<br>";
				$user_id=$res['user_id'];
				}}
				else{
					echo "ERROR:". mysqli_error($con);}
			   
			$sql="SELECT count(*) AS `no_of_fields` FROM `fields` WHERE `workspace_id`='$workspace_id'";
			$que=mysqli_query($con,$sql);
			if($que){
			while($row=mysqli_fetch_assoc($que)){
				$row['no_of_fields']."<br>";
				$test=$row['no_of_fields'];
				}}
				else{
					echo "ERROR:".mysqli_error($con);
					}
					
					$sql="SELECT * FROM `fields` WHERE `workspace_id`='$workspace_id'";
			$que=mysqli_query($con,$sql);
			if($que){
			 ?>
				<table class="insert-table">
                
                <tr>
                <th>Name</th>
                <th>Value</th>
                </tr>
                <tbody>
                <?php while($row=mysqli_fetch_assoc($que)){?>
                <tr>
                <td><?php echo $row['field_name']; ?></td>
                <td><input type="text" name="test_txtfield[]"></td>
                </tr>
                <?php } }
				else{
					echo "ERROR:".mysqli_error($con);
					}
				?>
                </tbody>
                </table>
                <input type="submit" name="btn" value="Submit" />
                <div class="clear"></div>
    		</div>
    </form>
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
<p>All Rights Reserved by Sheikh Mashhood Ali</p></div>

</body>
</html>
<?php
if(isset($_POST['btn'])){
	
	$fields=$_POST['test_txtfield'];
	$title=$_POST['post_name'];
	
	$sta="SELECT * FROM `posts` WHERE `title`= '$title'";
	$qwe=mysqli_query($con,$sta);
	if(mysqli_num_rows($qwe)>0){
		// header("location:insert_workspace_data2.php?err=Sorry this post title already exists..Try another one..");
		echo "<script>window.open('home.php?err=Sorry this post title already exists..Try another one..','_self');</script>";

		}
	else{
	
	$sql_post="INSERT INTO `posts`(`user_id`,`workspace_id`, `title`) VALUES ('$user_id','$workspace_id', '$title')";
	$quer=mysqli_query($con,$sql_post);
	if($que){
		echo "Data has been entered!!"."<br>";
			}
			else{
			echo "ERROR:";
				}
		
		
		
		$sqlia="SELECT * FROM `fields` WHERE `workspace_id`='$workspace_id'";
		$querys= mysqli_query($con,$sqlia);
		$id=array();
		if($querys){
		while($rows= mysqli_fetch_assoc($querys)){
		$rows['field_id'];
		$id[]=$rows['field_id'];
		$field_id=$rows['field_id']."<br>";
		}
		
		//echo "Outside the while".$field_id[0];
		//print_r($id);
		//for($i=0;$i<3;$i++){
//		echo $id[$i]."<br>";
//		}
//		
				}
			else{
				echo "Didnt work".mysqli_error($con);
				}
				
				
				$sql_po="SELECT * FROM `posts` WHERE `workspace_id`='$workspace_id'";
				$que_po=mysqli_query($con,$sql_po);
				while($rowe=mysqli_fetch_assoc($que_po)){
					 $rowe['post_id'];
					 $post_id=$rowe['post_id'];
					}
				
		
	for($i=0;$i<$test;$i++){
		$field=$fields[$i];
		//$field_ids=$field_id[$i];
		$ids=$id[$i];
		$sqls="INSERT INTO `fields_data`(`field_id`, `post_id`, `field_data`,`user_id`) VALUES ('$ids','$post_id','$field','$user_id')";
		$ques=mysqli_query($con,$sqls);
		if($ques){
			//header("location:home.php?suc=New Post to workspace have been added!!");
			echo "<script>window.open('home.php?suc=New Post to workspace have been added!!','_self');</script>";
			}
			else{
				echo "ERROR:".mysqli_error($con);
				}
		} 
		
		
		//header("location:somewhere.php");
		
	}
	}
?>
