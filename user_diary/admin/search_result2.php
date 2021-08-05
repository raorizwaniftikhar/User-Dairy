<?php
session_start();
include "connection.php";
if(!$_SESSION['admin_name']){
	header ("location:login.php?log=Please First Login");
	}
	$admin_name=$_SESSION['admin_name'];
	$mail=$_SESSION['admin_mail'];
$user=$_SESSION['admin_name'];
$user_id=@$_SESSION['user_id'];
@$_GET['suc'];
@$_GET['udel'];
@$_GET['sus'];
@$_GET['un'];
$admin_id=$_SESSION['admin_id'];
$name=@$_GET["res"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script src="script/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="script/jquery2.js"></script>

<script>

/*function print(){
	
	var org=document.body.innerHTML;
	var spc=document.getElementById("printable").innerHTML;
	document.body.innerHTML= spc;
	window.print();
	document.body.innerHTML= org;
	
}
*/

</script>

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
                placeholder="Search Users..." name="search" onkeyup="search(this.value)" />
            	               
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
        <a href="#"><li class="cont">Contact Us</li></a>
        <a href="logout.php"><li class="about">Logout</li></a>

        <div class="clear"></div>
        </ul>
        </div>
    </div>
</div>


<div class="home-body">
	    
    
	<div class="picture">
    	<div class="profile-pic">
		<?php
			$sep="SELECT `admin_pic` FROM `admin_login` WHERE `id`='$admin_id'";
			$quep=mysqli_query($con,$sep);
			while($pic=mysqli_fetch_assoc($quep)){
				$admin_pic=$pic['admin_pic'];
			}
		
			echo "<img src='uploads/$admin_pic'>";
		?>
        
        </div>
        
    </div>
	
    
    <div class="details">
    	<div class="coma-pic">
        <img src="images/invert.png" />
        </div>
        
        <div class="user-details">
        	
            <div class="left-detail">
            	<span class="name-detail">
                <p>Name</p>
                </span>
                
                <span class="value-detail">
                <?php echo $admin_name; ?>
            	</span>
                
                <div class="clear"></div>
                
                <!--<span class="name-detail">
                <p>Contact</p>
                </span>
                
                <span class="value-detail">
                <?php // echo $cell; ?>
            	</span>
-->                
                <div class="clear"></div>
                
                
                <span class="name-detail">
                <p>Email</p>
                </span>
                
                <span class="value-detail">
                <?php echo $mail; ?>
            	</span>
                
                <div class="clear"></div>
            </div>
            
            <div class="right-detail">
            
            
            	<span class="name-detail">
                <p>Total Users</p>
                </span>
                
                <span class="value-detail">
                <?php 
				$swl="SELECT count(*) AS `c` FROM `login`";
				$quw=mysqli_query($con,$swl);
				while($row=mysqli_fetch_assoc($quw)){
					echo $row['c'];
					} 
				 ?>
            	</span>
                
                <div class="clear"></div>
                
                <!--<span class="name-detail">
                <p>Status</p>
                </span>
                
                <span class="value-detail">
                Un-suspended
            	</span>-->
                
                <div class="clear"></div>
                
                
                <span class="name-detail">
                <p>Email</p>
                </span>
                
                <span class="value-detail">
                <?php echo $mail; ?>
            	</span>
                
                <div class="clear"></div>
            
            </div>
            
            <div class="clear"></div>
        
        </div>
        
        <div class="coma-pic2">
        <img src="images/invert2.png" />
        </div>
        
    </div>
    
	
	
	
    <div class="clear"></div>   
   
   <div class="para-home">
   <p><?php echo @$_GET['msg']; ?></p>
   <p><?php echo @$_GET['del']?></p>
   <p><?php echo @$_GET['sus']?></p>
   <p><?php echo @$_GET['suc']?></p>
   <p><?php echo @$_GET['udel']?></p>
   <p><?php echo @$_GET['un']?></p>
   <h2>List of All the Users</b></h2>
   </div>
   
   <div class="home">
   	<table class="home-table" method="POST" id="printable">
   	<thead>
    <tr>
    <th>No.</th>
    <th>UserName</th>
    <th>More Info</th>
    <th>Status</th>
    <th colspan="2">Actions</th>
    
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
    
    
    <td id="status" name="let"><?php 
	$date=date("d-m-Y");
$today=strtotime($date);
	$sel="SELECT * FROM `suspend` WHERE `user_id`='$id'";
	$run=mysqli_query($con,$sel);
	if(mysqli_num_rows($run)>0){
		while($row=mysqli_fetch_assoc($run)){
			$ex=$row['expiration_date'];
			}
			$expiry=strtotime($ex);
		if($today < $expiry){
		echo $yes="Suspended";
		}
		else{
			echo $no="Not Suspended";}
	}
		else{
			echo $no="Not Suspended";}
	
	?>
    </td>
    
    <td><?php echo "<a href='deluser.php?uid=$id'>Delete</a>"; ?></td>
    <td><?php
 if(isset($yes)){
	 echo "<a href='unsuspend.php?uid=$id'>Un-suspend</a>";
	 unset($yes);
	 }
	 elseif(isset($no)){
		 echo "<a id='susp' href='suspend.php?uid=$id'>Suspend</a>";
		 unset($no);}

	?>
    </td>
    
    
    
    
    <?php } }
	else{ ?>
		<td><?php echo "Sorry...There is no user to show.."; ?> </td>
	<?php	} ?>
    </tr>
    </tbody>
    </table>
		
		
   </div>
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
<div class="total-chat">
	<div class="head-chat">
    <span class="chat-adminname"><?php echo $admin_name;?></span><span class="close"><img src="images/cross.png"></span>
    </div>
 
	
    
	<div class="chat">
    
		<div id="messages">
    	<div class="left-load"><img src="images/load-logo.png"></div> <div class="right-load">Loading...</div>
   	 	</div>
    </div>
		<div class="msg">
    	<form id="form" name="frm">
    	<input type="hidden" value="<?php echo $admin_name; ?>" name="uname" id="name">
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